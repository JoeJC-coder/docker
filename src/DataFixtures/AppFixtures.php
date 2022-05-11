<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Id;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setUsername($faker->name());
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setPassword($faker->password());
            $user->setEmail($faker->email());
            $user->setCreatedAt($faker->dateTime());
            $manager->persist($user);

            $article = new Article();
            $article->setUsers($user);
            $article->setTitle($faker->sentence());
            $article->setContent($faker->text());
            $article->setImage($faker->imageUrl());
            $article->setCreatedAt($faker->dateTime());
            $manager->persist($article);


            $category = new Category();
            $category->setTitle($faker->sentence());
            $category->setDescription($faker->sentence());
            $category->setImage($faker->imageUrl());
            $manager->persist($category);



        }

        $manager->flush();
    }
}