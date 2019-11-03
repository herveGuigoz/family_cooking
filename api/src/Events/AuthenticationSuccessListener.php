<?php

namespace App\Events;

use App\Entity\Person;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event): void
    {
        $data = $event->getData();
        $person = $event->getUser();
        if (!$person instanceof Person) {
            return;
        }

        $data['id'] = $person->getId();
        $data['email'] = $person->getEmail();

        $event->setData($data);
    }
}
