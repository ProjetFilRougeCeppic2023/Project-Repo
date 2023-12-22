<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tags = [
            'Action', 'Comedy', 'Drama', 'Sci-Fi', 'Horror',
            'Adventure', 'Thriller', 'Romance', 'Fantasy', 'Mystery',
            'Crime', 'Animation', 'Family', 'History', 'War',
            'Documentary', 'Music', 'Sport', 'Western', 'Biography',
            'Musical', 'Film-Noir', 'Short', 'Adult', 'News'
        ];
        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
