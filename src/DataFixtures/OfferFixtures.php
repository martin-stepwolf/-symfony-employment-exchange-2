<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Offer;
use App\Entity\User;

class OfferFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        // test user that apply in the offers
        $applicant = new User();
        $applicant->setName('Normal user');
        $applicant->setEmail('user@see.com');
        $applicant->setRoles(['ROLE_APPLICANT']);
        $password = $this->encoder->encodePassword($applicant, 'symfony');
        $applicant->setPassword($password);
        $manager->persist($applicant);

        for ($i = 0; $i < 3; $i++) {
            $offer = new Offer();
            $offer->setTitle($faker->jobTitle);
            $offer->setDescription($faker->text($maxNbChars = 50));
            $offer->setSalary(mt_rand(100, 1000));
            $offer->setCompany($this->getReference(CompanyFixtures::COMPANY_REFERENCE));
            $offer->addApplicant($applicant);
            $manager->persist($offer);
        }

        $manager->flush();
    }
}
