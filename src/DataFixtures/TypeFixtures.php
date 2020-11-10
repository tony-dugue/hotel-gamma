<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $room = new Type();
        $room->setName('Chambre');
        $manager->persist($room);
        $this->addReference("type-room", $room);

        $appart = new Type();
        $appart->setName('Appartement');
        $manager->persist($appart);
        $this->addReference("type-apt", $appart);

        $manager->flush();
    }
}
