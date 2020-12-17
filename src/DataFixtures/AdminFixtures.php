<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AdminFixtures extends Fixture
{
    /**
     * Admin, Company and Offer Fixtures creates 2 users for testing all the application
     * admin@see.com and user@see.com with password by default 'symfony
     * MixFixtures just fill the database
     */

    private $encoder;
    public const ADMIN_USER_REFERENCE = 'admin-user';

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setName('Adminitrator');
        $admin->setEmail('admin@see.com');
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_COMPANY']);
        $password = $this->encoder->encodePassword($admin, 'symfony');
        $admin->setPassword($password);
        $manager->persist($admin);
        $manager->flush();
        $this->addReference(self::ADMIN_USER_REFERENCE, $admin);
    }
}
