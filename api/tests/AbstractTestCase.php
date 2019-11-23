<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractTestCase extends ApiTestCase
{
    protected function createUser(string $email, string $password): Person
    {
        $user = new Person();
        $user->setEmail($email);
        $user->setUsername(substr($email, 0, strpos($email, '@')));
        $user->setAvatar('baby');

        $encoded = self::$container->get('security.password_encoder')
            ->encodePassword($user, $password);
        $user->setPassword($encoded);

        /** @var EntityManagerInterface $em */
        $em = self::$container->get('doctrine')->getManager();
        $em->persist($user);
        $em->flush();

        return $user;
    }

    protected function logIn(Person $user)
    {
        return self::$container->get('lexik_jwt_authentication.jwt_manager')->create($user);
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return self::$container->get('doctrine')->getManager();
    }
}
