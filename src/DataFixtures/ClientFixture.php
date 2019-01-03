<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ClientFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {
            $client = new Client();
            $client->setNom($faker->lastName);
            $client->setPrenom($faker->firstName);
            $client->setDateNaissance($faker->date);
            $client->setAdresse($faker->address);
            $client->setTel($faker->randomNumber(8));
            $manager->persist($client);
        }
        $manager->flush();
    }
}
