<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $customers = [
            ['John Doe', 'john@example.com', 'Acme Inc.'],
            ['Jane Smith', 'jane@example.com', 'Globex Corp.'],
            ['Bob Johnson', 'bob@example.com', 'Initech'],
            ['Alice Williams', 'alice@example.com', 'Umbrella Corp.'],
        ];

        foreach ($customers as [$name, $email, $company]) {
            $customer = new Customer();
            $customer->setName($name);
            $customer->setEmail($email);
            $customer->setCompany($company);
            $customer->setFavorite(false);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
