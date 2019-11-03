<?php

namespace App\Events;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JWTCreatedListener
{
    /**
     * @var PersonRepository
     */
    private $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        $person = $event->getUser();
        $userName = $person->getUsername();
        $personEntity = $this->personRepository->findOneBy(['username' => $userName]);

        if (!$personEntity instanceof Person) {
            return;
        }

        $payload = $event->getData();
        $payload['email'] = $personEntity->getEmail();
        $payload['avatar'] = $personEntity->getAvatar();

        $event->setData($payload);
    }
}
