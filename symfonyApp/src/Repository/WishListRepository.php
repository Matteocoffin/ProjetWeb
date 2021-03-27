<?php

namespace App\Repository;

use App\Entity\WishList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Utilisateur;

/**
 * @method WishList|null find($id, $lockMode = null, $lockVersion = null)
 * @method WishList|null findOneBy(array $criteria, array $orderBy = null)
 * @method WishList[]    findAll()
 * @method WishList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WishList::class);
    }

    public function findWishlist(Utilisateur $user) : array
    {
        return $this->createQueryBuilder('w')
                    ->join('w.idOffre','t')
                    ->join('t.idEntreprise','f')
                    ->Where('w.idUtilisateur = '.$user->getIdUtilisateur().'')
                    ->addSelect('t')
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return WishList[] Returns an array of WishList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WishList
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
