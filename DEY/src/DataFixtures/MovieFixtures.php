<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory as ExceptionFactory;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // Utilisez $faker pour générer des données aléatoires
        for ($i = 0; $i < 15; $i++) {
            $movie = new Movie();
            $movie->setName($faker->name);
            $movie->setDescription($faker->paragraph(5));
            $movie->setThemes(implode(',', $faker->words(5)));

            $manager->persist($movie);
        }


        $manager->flush();
    }
}
