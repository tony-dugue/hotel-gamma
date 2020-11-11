<?php

namespace App\Repository;

use App\Entity\Accomodation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Accomodation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accomodation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accomodation[]    findAll()
 * @method Accomodation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccomodationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accomodation::class);
    }

    // récupérer tous les logements avec seulement les données pour les cards
    public function findAllAccomodations()
    {
        $qb = $this->createQueryBuilder('a');  // SELECT * FROM accomodation AS a

        return $qb->addSelect('type')
            ->addSelect('category')
            ->leftJoin('a.type', 'type')
            ->leftJoin('a.category', 'category')
            ->getQuery()
            ->getResult();
    }

    //récupérer liste des logements avec la barre de recherche (homepage)
    public function findSearchAccomodation($type, $minPrice, $maxPrice)
    {
        $qb = $this->createQueryBuilder('a');  // SELECT * FROM accomodation AS a

        return $qb->addSelect('type')
            ->leftJoin('a.type', 'type')
            ->andWhere('type.name = :val')
            ->andWhere('a.price BETWEEN :min AND :max')
            ->setParameter('val', $type)
            ->setParameter('min', $minPrice)
            ->setParameter('max', $maxPrice)
            ->getQuery()
            ->getResult();
    }

    // récupérer tous les chambres
    public function findAllRooms()
    {
        $qb = $this->createQueryBuilder('a');  // SELECT * FROM accomodation AS a

        return $qb->addSelect('type')
            ->addSelect('category')
            ->leftJoin('a.type', 'type')
            ->leftJoin('a.category', 'category')
            ->where('type.name = :val')
            ->setParameter('val', 'Chambre')
            ->getQuery()
            ->getResult();
    }

    // récupérer tous les appartements
    public function findAllApartments()
    {
        $qb = $this->createQueryBuilder('a');  // SELECT * FROM accomodation AS a

        return $qb->addSelect('type')
            ->addSelect('category')
            ->leftJoin('a.type', 'type')
            ->leftJoin('a.category', 'category')
            ->where('type.name = :val')
            ->setParameter('val', 'Appartement')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Accomodation[] Returns an array of Accomodation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Accomodation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
