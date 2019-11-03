<?php

namespace App\Security\Voter;

use App\Entity\Recipe;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class RecipeVoter extends Voter
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['EDIT'])
            && $subject instanceof Recipe;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        /** @var Recipe subject */

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'EDIT':
                if ($subject->getAuthor() === $user) {
                    return true;
                }
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return true;
                }

                return false;
        }

        throw new \Exception(sprintf('Unhandled attribute "%s"', $attribute));
    }
}
