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
    // use RefreshDatabaseTrait;
    // Resetting the database Between tests /!\ id's & iri changed
    use ReloadDatabaseTrait;

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

        $em = $this->getEntityManager();
        $user = $em->getRepository(Person::class)->findOneBy(['email' => 'bob@mail.com']);
        $this->assertInstanceOf(Person::class, $user);
        $this->assertEquals('bob', $user->getUsername());
    }

    public function testResetPassword(): void
    {
        $client = self::createClient();
        $passwordManager = self::$container->get('security.password_encoder');

        $user = $this->createUser('louis@mail.com', 'password');
        $jwt = $this->logIn($user);

        $client->request('PUT', '/people/'.$user->getId(), [
            'auth_bearer' => $jwt,
            'json' => [
                'email' => 'louis@mail.com',
                'password' => '123456',
            ],
        ]);

        self::assertResponseStatusCodeSame(200);
        self::assertEquals(true, $passwordManager->isPasswordValid($user, '123456'));
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

    public function testUpdatePerson()
    {
        $client = self::createClient();
        $user = $this->createUser('bob@gmail.com', 'password');
        self::assertEquals('baby', $user->getAvatar());
        $jwt = $this->logIn($user);

        $client->request('PUT', '/people/'.$user->getId(), [
            'auth_bearer' => $jwt,
            'json' => [
                'email' => 'louis@mail.com',
                'avatar' => 'songoku',
                'roles' => ['ROLE_ADMIN'], // will be ignored
            ],
        ]);

        self::assertResponseStatusCodeSame(200);
        self::assertEquals('songoku', $user->getAvatar());
        $em = $this->getEntityManager();
        self::assertEquals(['ROLE_USER'], $em->getRepository(Person::class)->find($user->getId())->getRoles());
    }

    public function testDeleteUser()
    {
        $client = self::createClient();

        $user = $this->createUser('user@gmail.com', 'password');
        $secondUser = $this->createUser('seconduser@mail.com', 'password');

        $this->assertEquals(['ROLE_USER'], $user->getRoles());
        $userJWT = $this->logIn($user);

        $client->request('DELETE', '/people/'.$secondUser->getId(), ['auth_bearer' => $userJWT]);
        self::assertResponseStatusCodeSame(403);
    }

    public function testAdminDeleteUser()
    {
        $client = self::createClient();
        $em = $this->getEntityManager();

        $user = $this->createUser('user@gmail.com', 'password');

        $admin = $this->createUser('admin@gmail.com', 'password');
        $admin->setRoles(['ROLE_ADMIN']);
        $em->flush();

        $JWT = $this->logIn($admin);

        $client->request('DELETE', '/people/'.$user->getId(), ['auth_bearer' => $JWT]);
        self::assertResponseStatusCodeSame(204);
    }

    public function testAnonymousGetCollection()
    {
        $client = self::createClient();

        $client->request('GET', '/people');
        self::assertResponseStatusCodeSame(401);
    }

    public function testUserGetCollection()
    {
        $client = self::createClient();
        $em = $this->getEntityManager();

        $user = $this->createUser('user@gmail.com', 'password');
        $JWT = $this->logIn($user);
        $this->assertEquals(['ROLE_USER'], $user->getRoles());

        $client->request('GET', '/people', ['auth_bearer' => $JWT]);
        self::assertResponseStatusCodeSame(403);
    }

    public function testAdminGetCollection()
    {
        $client = self::createClient();
        $em = $this->getEntityManager();

        $user = $this->createUser('admin@gmail.com', 'password');
        $user->setRoles(['ROLE_ADMIN']);
        $em->flush();

        $JWT = $this->logIn($user);

        $client->request('GET', '/people', ['auth_bearer' => $JWT]);
        self::assertResponseStatusCodeSame(200);
        self::assertJsonContains([
            'hydra:totalItems' => 10,
        ]);
    }

    public function testAnonymousGetItem()
    {
        $client = self::createClient();
        $user = $this->createUser('bob@mail.com', 'password');
        $client->request('GET', '/people/'.$user->getId());
        self::assertResponseStatusCodeSame(401);
    }

    public function testUserGetItem()
    {
        $client = self::createClient();
        $userToGet = $this->createUser('usertoget@mail.com', 'password');

        $user = $this->createUser('user@gmail.com', 'password');
        $JWT = $this->logIn($user);
        $this->assertEquals(['ROLE_USER'], $user->getRoles());

        $client->request('GET', '/people/'.$userToGet->getId(), ['auth_bearer' => $JWT]);
        self::assertResponseStatusCodeSame(403);
    }

    public function testAdminGetItem()
    {
        $client = self::createClient();
        $em = $this->getEntityManager();

        $userToGet = $this->createUser('usertoget@mail.com', 'password');

        $user = $this->createUser('admin@gmail.com', 'password');
        $user->setRoles(['ROLE_ADMIN']);
        $em->flush();

        $JWT = $this->logIn($user);

        $client->request('GET', '/people/'.$userToGet->getId(), ['auth_bearer' => $JWT]);
        self::assertResponseStatusCodeSame(200);
        self::assertJsonContains([
            '@context' => '/contexts/person',
            '@id' => '/people/'.$userToGet->getId(),
            '@type' => 'person',
            'id' => $userToGet->getId(),
            'username' => 'usertoget',
            'email' => 'usertoget@mail.com',
            'roles' => ['ROLE_USER'],
            'avatar' => 'baby',
        ]);
    }
}
