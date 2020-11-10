<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("tony.dugue@gmail.com")
            ->setFirstName("Tony")
            ->setLastName("Dugué")
            ->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($admin, "tdugue");
        $admin->setPassword($password);
        $manager->persist($admin);

        $pierre = new User();
        $pierre->setEmail("pierre.jehan@gmail.com")
            ->setFirstName("Pierre")
            ->setLastName("Jehan")
            ->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($pierre, "pjehan");
        $pierre->setPassword($password);
        $manager->persist($pierre);

        // initialisation du générateur faker
        $faker = Factory::create('fr-FR');

        for($i = 1; $i <= 10; $i++) {

            // génération des noms et prénoms avec faker
            $firstname = $faker->firstName();
            $lastname = $faker->lastName();
            $username = substr($firstname,0,1) . $lastname;

            $user = new User();
            $user->setEmail($firstname . "." . $lastname . "@gmail.com")
                ->setFirstName($firstname)
                ->setLastName($lastname);
            $password = $this->encoder->encodePassword($user, $username);
            $user->setPassword($password);
            $manager->persist($user);
            $this->addReference("user-" . $i, $user);
        }

        $manager->flush();
    }
}
