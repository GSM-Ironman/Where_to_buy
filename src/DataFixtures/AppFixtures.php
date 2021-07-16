<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $passwordEncoder;

    public function __Construct(UserPasswordEncoderInterface $passwordEncoder){

        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@admin.com');
        $user->setFirstname('max');

        $user->setPassword($this->passwordEncoder->encodePassword(
        $user,
        'superuser'));
        $manager->persist($user);
        $manager->flush();
    }
}
