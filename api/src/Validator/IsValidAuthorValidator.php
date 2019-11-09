<?php

namespace App\Validator;

use App\Entity\Person;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsValidAuthorValidator extends ConstraintValidator
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint IsValidAuthor */
        if (null === $value || '' === $value) {
            return;
        }

        $user = $this->security->getUser();
        if (!$user instanceof Person) {
            $this->context->buildViolation($constraint->anonymousMessage)
                ->addViolation();

            return;
        }

        // allow admin users to change owners
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return;
        }

        if (!$value instanceof Person) {
            throw new \InvalidArgumentException('@IsValidOwner constraint must be put on a property containing a Person object');
        }

        if ($value->getId() !== $user->getId()) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
