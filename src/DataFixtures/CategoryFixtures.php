<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $std = new Category();
        $std->setName('Standard');
        $manager->persist($std);
        $this->addReference("cat-std", $std);

        $sup = new Category();
        $sup->setName('Supérieure');
        $manager->persist($sup);
        $this->addReference("cat-sup", $sup);

        $manager->flush();
    }
}
