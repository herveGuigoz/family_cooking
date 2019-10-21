<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use App\Repository\UserRepository;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class UserResourceTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testRegisterUser(): void
    {
        $client = self::createClient();

        $client->request('POST', '/register', [
            'json' => [
                'email' => 'johnDoe@example.com',
                'username' => 'johnDoe',
                'password' => 'brie',
            ],
        ]);

        // We log the user returning JWT token
        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(200);

        /** @var UserRepository $repo */
        $repo = self::$container->get('doctrine')->getManager()->getRepository(User::class);
        $user = $repo->findOneBy(['email' => 'johnDoe@example.com']);
        $this->assertEquals('johnDoe', $user->getUsername());
        $repo->remove($user);
    }
}
