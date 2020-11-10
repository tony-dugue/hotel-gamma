<?php

namespace App\DataFixtures;

use App\Entity\Accomodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AccomodationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $accomodation1 = new Accomodation();
        $accomodation1->setBeds(1)
            ->setPersons(2)
            ->setSize(40)
            ->setPhoto('room1.jpeg')
            ->setPrice(90)
            ->setDescription('Une chambre élégante et raffinée, pour deux personnes, point de départ d’une escapade romantique.')
            ->setCategory($this->getReference("cat-std"))
            ->setType($this->getReference("type-room"))
            ->addAmenity($this->getReference("am-1"))
            ->addAmenity($this->getReference("am-2"))
            ->addAmenity($this->getReference("am-3"));
        $manager->persist($accomodation1);
        $this->addReference("acc-1", $accomodation1);

        $accomodation2 = new Accomodation();
        $accomodation2->setBeds(2)
            ->setPersons(4)
            ->setSize(60)
            ->setPhoto('room2.jpeg')
            ->setPrice(120)
            ->setDescription('Une chambre confortable et reposante, pouvant accueillir jusqu\'à 4 personnes, idéale pour 
        un séjour en famille')
            ->setCategory($this->getReference("cat-std"))
            ->setType($this->getReference("type-apt"))
            ->addAmenity($this->getReference("am-1"))
            ->addAmenity($this->getReference("am-3"))
            ->addAmenity($this->getReference("am-5"));
        $manager->persist($accomodation2);
        $this->addReference("acc-2", $accomodation2);

        $accomodation3 = new Accomodation();
        $accomodation3->setBeds(1)
            ->setPersons(2)
            ->setSize(50)
            ->setPhoto('room3.jpeg')
            ->setPrice(110)
            ->setDescription('Une chambre cosy et agréable, pour deux personnes, qui se prête à un agréable séjour dans la ville')
            ->setCategory($this->getReference("cat-sup"))
            ->setType($this->getReference("type-room"))
            ->addAmenity($this->getReference("am-3"))
            ->addAmenity($this->getReference("am-5"));
        $manager->persist($accomodation3);
        $this->addReference("acc-3", $accomodation3);

        $accomodation4 = new Accomodation();
        $accomodation4->setBeds(2)
            ->setPersons(4)
            ->setSize(65)
            ->setPhoto('room4.jpeg')
            ->setPrice(120)
            ->setDescription('Une chambre moderne et confortable avec 2 lits, idéal pour des vacances en famille.')
            ->setCategory($this->getReference("cat-std"))
            ->setType($this->getReference("type-apt"))
            ->addAmenity($this->getReference("am-1"))
            ->addAmenity($this->getReference("am-2"))
            ->addAmenity($this->getReference("am-3"))
            ->addAmenity($this->getReference("am-4"))
            ->addAmenity($this->getReference("am-5"));
        $manager->persist($accomodation4);
        $this->addReference("acc-4", $accomodation4);

        $accomodation5 = new Accomodation();
        $accomodation5->setBeds(1)
            ->setPersons(2)
            ->setSize(33)
            ->setPhoto('room5.jpeg')
            ->setPrice(80)
            ->setDescription('Une chambre reposante et spacieuse, pour deux personnes, donnant sur la cour intérieure de l’hôtel, à l’écart de l’effervescence de la ville.')
            ->setCategory($this->getReference("cat-std"))
            ->setType($this->getReference("type-room"))
            ->addAmenity($this->getReference("am-2"))
            ->addAmenity($this->getReference("am-3"));
        $manager->persist($accomodation5);
        $this->addReference("acc-5", $accomodation5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
            CategoryFixtures::class,
            AmenityFixtures::class
        ];
    }
}
