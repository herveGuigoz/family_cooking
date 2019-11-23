<?php

namespace App\Tests;

class RecipeActionsTest extends AbstractTestCase
{
    public function testGetRecipeCollection(): void
    {
        $client = static::createClient();
        $response = $client->request('GET', '/recipes');
        self::assertResponseIsSuccessful();
    }
}
