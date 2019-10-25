<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use App\Repository\UserRepository;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Hautelook\AliceBundle\PhpUnit\RecreateDatabaseTrait;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;

class UserActionsTest extends ApiTestCase
{
    // Erase and recreate database schema before each tests.
    // Useful if we want to skip initialize env test database every time we make start
    use RecreateDatabaseTrait;
    // Refresh the database content to put it in a known state between every tests
    // use RefreshDatabaseTrait;
    // Resetting the database Between tests /!\ id's & iri changed
    //use ReloadDatabaseTrait;

    public function testRegisterUser(): void
    {
        $client = self::createClient();

        $client->request('POST', '/register', [
            'json' => [
                'email' => 'bob@mail.com',
                'username' => 'bob',
                'password' => 'password',
            ],
        ]);

        // We log the user returning JWT token
        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(200);

        /** @var UserRepository $userRepository */
        $userRepository = self::$container->get('doctrine')->getManager()->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => 'bob@mail.com']);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('bob', $user->getUsername());
    }

    public function testLoginUser(): void
    {
        $client = self::createClient();
        $em = self::$container->get('doctrine')->getManager();

        $user = new User();
        $user->setEmail('pepito@mail.com');
        $user->setUsername('pepito');

        $encoded = self::$container->get('security.password_encoder')
            ->encodePassword($user, '123456');
        $user->setPassword($encoded);
        $em->persist($user);
        $em->flush();

        $client->request('POST', '/login', [
            'json' => [
                'username' => $user->getUsername(),
                'password' => '123456',
            ],
        ]);

        self::assertResponseStatusCodeSame(200);
    }

    public function testResetPassword(): void
    {
        $client = self::createClient();
        $em = self::$container->get('doctrine')->getManager();

        $user = new User();
        $user->setEmail('louis@mail.com');
        $user->setUsername('louis');

        $passwordManager = self::$container->get('security.password_encoder');
        $encoded = $passwordManager->encodePassword($user, '123456');

        $user->setPassword($encoded);
        $em->persist($user);
        $em->flush();

        $client->request('POST', '/edit', [
            'json' => [
                'username' => $user->getUsername(),
                'password' => '123456',
                'newPassword' => '654321',
            ],
        ]);

        self::assertResponseStatusCodeSame(200);
        self::assertEquals(true, $passwordManager->isPasswordValid($user, '654321'));
    }
}
