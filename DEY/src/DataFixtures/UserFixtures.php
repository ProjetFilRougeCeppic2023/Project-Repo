<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // Utilisez $faker pour générer des données aléatoires
        for ($i = 0; $i < 15; $i++) {
            $movie = new User();
            $movie->setUsername($faker->name);
            $movie->setRoles(['ROLE_USER']);
            $movie->setPassword('motdepasse');
            $movie->setPassword($faker->email());

            $manager->persist($movie);
        }
        $manager->flush();
    }
}
