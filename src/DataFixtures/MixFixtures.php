<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Company;
use App\Entity\Offer;

class MixFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Test data just to fill the database
        $faker = \Faker\Factory::create();

        // it creates a company with its user and an offer.
        for ($i = 0; $i < 7; $i++) {
            $user = new User();
            $user->setName($faker->name());
            $user->setEmail($faker->safeEmail);
            $user->setRoles(['ROLE_COMPANY']);
            $user->setPassword($faker->password(6, 10));
            $manager->persist($user);

            $company = new Company();
            $company->setName($faker->company);
            $company->setEmail($faker->safeEmail);
            $company->setOwner($user);
            $manager->persist($company);

            $applicant = new User();
            $applicant->setName($faker->name());
            $applicant->setEmail($faker->safeEmail);
            $applicant->setRoles(['ROLE_APPLICANT']);
            $applicant->setPassword($faker->password(6, 10));
            $manager->persist($applicant);

            $offer = new Offer();
            $offer->setTitle($faker->jobTitle);
            $offer->setDescription($faker->text($maxNbChars = 50));
            $offer->setSalary(mt_rand(100, 1000));
            $offer->setCompany($company);
            $offer->addApplicant($applicant);
            $manager->persist($offer);
        }
        $manager->flush();
    }
}
