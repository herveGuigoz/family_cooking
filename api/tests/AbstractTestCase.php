<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
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

    protected function logIn(Client $client, string $username, string $password): array
    {
        $client->request('POST', '/login', [
            'json' => [
                'username' => $username,
                'password' => $password,
            ],
        ]);
        self::assertResponseStatusCodeSame(200);

        $token = $client->getResponse()->toArray();
        $this->assertArrayHasKey('token', $token);

        return $token;
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return self::$container->get('doctrine')->getManager();
    }
}
