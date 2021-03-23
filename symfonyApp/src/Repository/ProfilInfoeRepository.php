<?php

namespace App\Repository;

use App\Entity\ProfilInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProfilInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilInfo[]    findAll()
 * @method ProfilInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilInfoeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilInfo::class);
    }

    // /**
    //  * @return ProfilInfo[] Returns an array of ProfilInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProfilInfo
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
