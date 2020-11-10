<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PhotoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $photo1 = new Photo();
        $photo1->setFilename('room1-1.jpeg')
            ->setAlt('Photo de chambre')
            ->setAccomodation($this->getReference("acc-1"));
        $manager->persist($photo1);

        $photo2 = new Photo();
        $photo2->setFilename('room2-1.jpeg')
            ->setAlt('Photo de chambre')
            ->setAccomodation($this->getReference("acc-2"));
        $manager->persist($photo2);

        $photo3 = new Photo();
        $photo3->setFilename('room2-2.jpeg')
            ->setAlt('Photo de chambre')
            ->setAccomodation($this->getReference("acc-2"));
        $manager->persist($photo3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AccomodationFixtures::class
        ];
    }
}
