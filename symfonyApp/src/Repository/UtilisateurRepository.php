<?php

namespace App\Repository;

use App\Entity\Search\CompteSearch;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    public function FindUtilisateur()
    {
        return $this->createQueryBuilder(alias:'c')
                    ->join('c.idType','r')
                    ->join('c.idPromo','f')
                    ->join('c.idCentre','t')
                    ->getQuery()
                    ->getResult();
    }

    public function FindUtilisateurQuery(CompteSearch $search): array
    {
        $query = $this->createQueryBuilder(alias:'c')
                    ->join('c.idType','r')
                    ->join('c.idPromo','f')
                    ->join('c.idCentre','t');
        if(!empty($search->s)){
            $query = $query
                    ->andWhere('c.login LIKE :s')
                    ->setParameter('s',"%{$search->s}%");
        }
        if(!empty($search->idSearch)){
            $query = $query
                    ->andWhere('c.idUtilisateur = :idSearch')
                    ->setParameter('idSearch',$search->idSearch);
        }

        if(!empty($search->SearchType)){
            $query = $query
                    ->andWhere('r.type IN (:SearchType)')
                    ->setParameter('SearchType',$search->SearchType);
        }

        if(!empty($search->SearchPromo)){
            $query = $query
                    ->andWhere('f.promotionEcole IN (:SearchPromo)')
                    ->setParameter('SearchPromo',$search->SearchPromo);
        }

        if(!empty($search->SearchCentre)){
            $query = $query
                    ->andWhere('t.centre LIKE :SearchCentre')
                    ->setParameter('SearchCentre',"%{$search->SearchCentre}%");
        }
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Utilisateur[] Returns an array of Utilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
