<?php

namespace App\Tests;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Hautelook\AliceBundle\PhpUnit\RecreateDatabaseTrait;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;

class UserActionsTest extends AbstractTestCase
{
    // Erase and recreate database schema before each tests.
    // Useful if we want to skip initialize env test database every time we make start
    // use RecreateDatabaseTrait;
    // Refresh the database content to put it in a known state between every tests
    use RefreshDatabaseTrait;
    // Resetting the database Between tests /!\ id's & iri changed
    // use ReloadDatabaseTrait;

    public function testRegisterUser(): void
    {
        $client = self::createClient();

        $client->request('POST', '/people', [
            'json' => [
                'email' => 'bob@mail.com',
                'username' => 'bob',
                'password' => 'password',
            ],
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(201);

        /** @var PersonRepository $personRepository */
        $personRepository = self::$container->get('doctrine')->getManager()->getRepository(Person::class);
        $user = $personRepository->findOneBy(['email' => 'bob@mail.com']);
        $this->assertInstanceOf(Person::class, $user);
        $this->assertEquals('bob', $user->getUsername());
    }

    public function testLoginUser(): void
    {
        $client = self::createClient();

        $user = $this->createUser('pepito@mail.com', 'password');

        $this->logIn($client, $user->getUsername(), 'password');
    }

    public function testResetPassword(): void
    {
        $client = self::createClient();
        $passwordManager = self::$container->get('security.password_encoder');

        $user = $this->createUser('louis@mail.com', '123456');

        $client->request('POST', '/edit', [
            'json' => [
                'username' => 'louis',
                'email' => 'louis@mail.com',
                'avatar' => 'walterwhite',
                'password' => '123456',
                'newPassword' => '654321',
            ],
        ]);

        self::assertResponseStatusCodeSame(200);
        self::assertEquals(true, $passwordManager->isPasswordValid($user, '654321'));
    }

    public function testDefaultAvatar()
    {
        $client = self::createClient();

        $client->request('POST', '/people', [
            'json' => [
                'username' => 'gerard',
                'email' => 'gerard@mail.com',
                'password' => 'password',
            ],
        ]);

        $em = $this->getEntityManager();
        /** @var PersonRepository $personRepository * */
        $personRepository = $em->getRepository(Person::class);
        /** @var Person $user */
        $user = $personRepository->findOneBy(['username' => 'gerard']);

        self::assertInstanceOf(Person::class, $user);
        self::assertEquals('baby', $user->getAvatar());
    }
}
