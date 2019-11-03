<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Person;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoderSubscriber
{
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public static function getSubscribedEvents(): array
    {
        // Definition de l'event du kernel + hook + methods a éffectuer
        // https://api-platform.com/docs/core/events/
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE],
        ];
    }

    public function encodePassword(ViewEvent $event): void
    {
        $person = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($person instanceof Person && 'POST' === $method) {
            $hash = $this->encoder->encodePassword($person, $person->getPassword());
            $person->setPassword($hash);
        }
    }
}
