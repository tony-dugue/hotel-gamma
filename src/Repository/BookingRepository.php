<?php

namespace App\Repository;

use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    // récupérer les meilleurs logements réservés
    public function findBestAccommodations($limit)
    {
        $qb = $this->createQueryBuilder('b')  // SELECT * FROM booking AS b
            ->from('App:Accomodation', 'a')
            ->select('a')
            ->groupBy('b.accomodation', 'a')
            ->orderBy('count(b.accomodation)', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()
            ->getResult();
    }
}

