<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $serviceNom = ["IT", "Comptabilité", "SAV", "Prod"];

        foreach ($serviceNom as $index => $serviceNom) {
            $service = new Service();
            $service->setNom($serviceNom)
                    ->setDescription($faker->sentence(10))
                    ->setDtCreation($faker->dateTimeBetween('-1 year'));

                    $this->addReference('service_' . $serviceNom, $service);

                    $manager->persist($service);
        } 
        $manager->flush();
    }
}
