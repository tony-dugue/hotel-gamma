<?php

namespace App\DataFixtures;

use App\Entity\Booking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // initialisation du générateur faker
        $faker = Factory::create('fr-FR');

        for($i = 1; $i <= 10; $i++) {
            $booking = new Booking();

            // génération de date de réservation avec faker
            $date_start = $faker->dateTimeBetween('now', '+4 months');
            $duration = mt_rand(1, 7);
            $date_end = (clone $date_start)->modify("+$duration days");

            $booking->setDateStart($date_start);
            $booking->setDateEnd($date_end);

            $booking->setUser($this->getReference('user-' . mt_rand(1, 10)));
            $booking->setAccomodation($this->getReference('acc-' . mt_rand(1, 5)));

            $manager->persist($booking);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            AccomodationFixtures::class
        ];
    }
}
