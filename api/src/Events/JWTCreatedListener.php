<?php

namespace App\Events;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JWTCreatedListener
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        $user = $event->getUser();
        $userName = $user->getUsername();
        $userEntity = $this->userRepository->findOneBy(['username' => $userName]);

        if (!$userEntity instanceof User) {
            return;
        }

        $payload = $event->getData();
        $payload['email'] = $userEntity->getEmail();
        $payload['avatar'] = $userEntity->getAvatar();

        $event->setData($payload);
    }
}
