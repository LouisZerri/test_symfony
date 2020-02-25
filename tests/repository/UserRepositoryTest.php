<?php

namespace App\Tests\Repository;

use App\DataFixtures\UserFixtures;
use App\Repository\UserRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRepositoryTest extends WebTestCase
{
    use FixturesTrait;

    public function testCount()
    {
        //On démarre le kernel
        self::bootKernel();

        //$this->loadFixtures([UserFixtures::class]);

        //ou via le yaml
        $this->loadFixtureFiles([
            __DIR__ . '/UserRepositoryTestFixtures.yaml'
        ]);

        $users = self::$container->get(UserRepository::class)->count([]);

        $this->assertEquals(10, $users);

    }
}