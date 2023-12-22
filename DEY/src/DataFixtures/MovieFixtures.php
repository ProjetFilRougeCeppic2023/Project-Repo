<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // Load tags from the database
        $tags = $manager->getRepository(Tag::class)->findAll();
        // Utilisez $faker pour générer des données aléatoires
        for ($i = 0; $i < 15; $i++) {
            $movie = new Movie();
            $movie->setName($faker->name);
            $movie->setDescription($faker->paragraph(5));
            $movie->setThemes(implode(',', $faker->words(5)));
            
            // Set creation date manually before persisting
            $movie->setCreationDateValue();


            $randomTags = $faker->randomElements($tags, $faker->numberBetween(1, 3));
            foreach ($randomTags as $tag) {
                $movie->addTag($tag);
            }

            $manager->persist($movie);
        }


        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [TagFixtures::class];
    }
}
