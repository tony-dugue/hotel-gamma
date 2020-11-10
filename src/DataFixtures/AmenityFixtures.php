<?php

namespace App\DataFixtures;

use App\Entity\Amenity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AmenityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $am1 = new Amenity();
        $am1->setName('Cuisine')
            ->setIcon('fa fa-cutlery');
        $manager->persist($am1);
        $this->addReference("am-1", $am1);

        $am2 = new Amenity();
        $am2->setName('Accessibilité')
            ->setIcon('fa fa-wheelchair');
        $manager->persist($am2);
        $this->addReference("am-2", $am2);

        $am3 = new Amenity();
        $am3->setName('Wifi')
            ->setIcon('fa fa-wifi');
        $manager->persist($am3);
        $this->addReference("am-3", $am3);

        $am4 = new Amenity();
        $am4->setName('Douche')
            ->setIcon('fa fa-shower');
        $manager->persist($am4);
        $this->addReference("am-4", $am4);

        $am5 = new Amenity();
        $am5->setName('Machine à café')
            ->setIcon('fa fa-coffee');
        $manager->persist($am5);
        $this->addReference("am-5", $am5);

        $manager->flush();
    }
}
