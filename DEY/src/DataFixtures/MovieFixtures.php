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


        $movieData = [
            ['title' => 'The Shawshank Redemption', 'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'themes' => 'Drama', 'tags' => ['Drama']],
            ['title' => 'The Godfather', 'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'themes' => 'Crime, Drama', 'tags' => ['Crime', 'Drama']],
            
        ];
        
        foreach ($movieData as $data) {
            $movie = new Movie();
            $movie->setName($data['title']);
            $movie->setDescription($data['description']);
            $movie->setThemes($data['themes']);
        
            $movie->setCreationDateValue();
        
            // Ajoutez les tags spécifiques à chaque film
            foreach ($data['tags'] as $tagName) {
                $tag = $manager->getRepository(Tag::class)->findOneBy(['name' => $tagName]);
                if ($tag) {
                    $movie->addTag($tag);
                }
            }
        
            $manager->persist($movie);
        }


        ///////////////////////////////////////////////////////////////////
        // Utilisez $faker pour générer des données aléatoires
        for ($i = 0; $i < 100; $i++) {
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
