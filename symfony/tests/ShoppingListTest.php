<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShoppingListTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/shopping/add');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form button[type="submit"]');
        $this->assertSelectorExists('form[name="shopping_list"]');
    }
}
