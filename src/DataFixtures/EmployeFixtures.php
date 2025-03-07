<?php

namespace App\DataFixtures;

use App\Entity\Employe;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EmployeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 30; $i++) {
            $employe = new Employe();
            $employe->setPrenom($faker->firstName)
                    ->setNom($faker->lastName)
                    ->setTelephone($faker->phoneNumber)
                    ->setEmail($faker->email)
                    ->setAdresse($faker->address)
                    ->setPoste($faker->jobTitle)
                    ->setSalaire($faker->numberBetween(2000, 5000))
                    ->setDtNaissance($faker->dateTimeBetween('-65 years', '-18 years'))
                    ->setIsactive($faker->boolean(0.5));
                    $randomServiceName = $faker->randomElement(["IT", "Comptabilité", "SAV", "Prod"]);
                    $employe->setService($this->getReference('service_' . $randomServiceName, Service::class)); 
                    $manager->persist($employe);

        }

            $manager->flush();
        }
        public function getDependencies(): array
        {
            return [
                ServiceFixtures::class,
            ];
        }
}