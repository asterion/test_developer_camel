<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 32; $i++) {
            $u = new User();
            $u->setEmail($faker->unique()->email);
            $u->setPassword($faker->password);
            $u->setName($faker->unique()->name);
            $u->setLastAccess(new \DateTime('now'));
            $u->setRole(($i % 2) == 0 ? 'admin' : 'user');
            $manager->persist($u);
        }

        $manager->flush();
    }
}
