<?php


namespace App\Tests;

use App\Entity\User;
use App\Test\CustomApiTestCase;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;

class UserResourceTest extends CustomApiTestCase
{
    use ReloadDatabaseTrait;

    public function testCreateUser(): void
    {
        $client = self::createClient();

        $client->request('POST', '/register', [
            'json' => [
                'email' => 'cheeseplease@example.com',
                'username' => 'cheeseplease',
                'password' => 'brie'
            ]
        ]);
        $this->assertResponseStatusCodeSame(201);

        $this->logIn($client, 'cheeseplease@example.com', 'brie');
    }

}
