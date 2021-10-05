<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testIndex()
    {
        
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        
    }
}
