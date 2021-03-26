<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
use Faker\Provider\Image;
use Faker\Provider\Base;
use Doctrine\Persistence\ObjectManager;
use \App\Entity\ArticleTwig;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $article = new ArticleTwig();
            $article->setTitle( Lorem::sentence());
            $article->setSubtitle( Lorem::paragraph(2));
            $article->setCreatedAt( DateTime::dateTime());
            $article->setAuthor( $faker->name);
            $article->setBody($faker->text);
            $article->setImage( Image::imageUrl(
                Base::numberBetween(400,800),
                Base::numberBetween(400,800)
            ));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
