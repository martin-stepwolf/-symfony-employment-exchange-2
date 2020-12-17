<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Company;

class CompanyFixtures extends Fixture
{
    public const COMPANY_REFERENCE = 'company';

    public function load(ObjectManager $manager)
    {
        $company = new Company();
        $company->setName('Symfony Employment Exchange');
        $company->setEmail('test_mail@s-e-e.com');
        $company->setOwner($this->getReference(AdminFixtures::ADMIN_USER_REFERENCE));
        $manager->persist($company);
        $manager->flush();
        $this->addReference(self::COMPANY_REFERENCE, $company);
    }
}
