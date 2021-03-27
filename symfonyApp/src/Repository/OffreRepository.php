<?php

namespace App\Repository;

use App\Entity\Offre;
use App\Entity\Search\OffreGSearch;
use App\Entity\Search\OffreSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offre[]    findAll()
 * @method Offre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offre::class);
    }

    public function FindOffre()
    {
        return $this->createQueryBuilder(alias:'c')
                    ->join('c.idEntreprise','r')
                    ->join('r.idLocalite','t')
                    ->join('c.idCompetences','f')
                    ->join('f.idOffre','m')
                    ->addSelect('r')
                    ->addSelect('f')
                    ->getQuery()
                    ->getResult();
    
    }

    /**
     * @return Offre[]
     */

    public function FindOffreGQuery(OffreGSearch $search): array
    {
        $query = $this->createQueryBuilder(alias:'c')
                        ->join('c.idEntreprise','r')
                        ->join('r.idLocalite','t')
                        ->join('c.idCompetences','f')
                        ->join('f.idOffre','m')
                        ->addSelect('r')
                        ->addSelect('f');
        if(!empty($search->s)){
            $query = $query
                    ->andWhere('c.titre LIKE :s')
                    ->setParameter('s',"%{$search->s}%");
        }

        if(!empty($search->min)){
            $query = $query
                    ->andWhere('c.remuneration >= :min')
                    ->setParameter('min',"$search->min");
        }
        if(!empty($search->max)){
            $query = $query
                    ->andWhere('c.remuneration <= :max')
                    ->setParameter('max',"$search->max");
        }
        if(!empty($search->nbplace)){
            $query = $query
                    ->andWhere('c.nbPlace = :nbplace')
                    ->setParameter('nbplace',"$search->nbplace");
        }

        if(!empty($search->idSearch)){
            $query = $query
                    ->andWhere('c.idOffre = :idSearch')
                    ->setParameter('idSearch',$search->idSearch);
        }
        return $query->getQuery()->getResult();
    }
    /**
     * @return Offre[]
     */

    public function FindOffreQuery(OffreSearch $search): array
    {
        $query = $this->createQueryBuilder(alias:'c')
                        ->join('c.idEntreprise','r')
                        ->join('r.idLocalite','t')
                        ->join('c.idCompetences','f')
                        ->join('f.idOffre','m')
                        ->addSelect('r')
                        ->addSelect('f');
        if(!empty($search->s)){
            $query = $query
                    ->andWhere('c.titre LIKE :s')
                    ->setParameter('s',"%{$search->s}%");
        }

        if(!empty($search->min)){
            $query = $query
                    ->andWhere('c.remuneration >= :min')
                    ->setParameter('min',"$search->min");
        }
        if(!empty($search->max)){
            $query = $query
                    ->andWhere('c.remuneration <= :max')
                    ->setParameter('max',"$search->max");
        }

        //if(!empty($search->Searchlocalite)){
        //    $query = $query
        //            ->andWhere('t.idLocalite IN (:Searchlocalite)')
        //            ->setParameter('Searchlocalite',$search->Searchlocalite);
        //}

        if(!empty($search->Searchlocalite)){
            $query = $query
                    ->andWhere('t.region LIKE :Searchlocalite')
                    ->setParameter('Searchlocalite',"%{$search->Searchlocalite}%");
        }

        if(!empty($search->SearchCompetences)){
            $query = $query
                    ->andWhere('f.competences LIKE :SearchCompetences')
                    ->setParameter('SearchCompetences',"%{$search->SearchCompetences}%");
        }

        if(!empty($search->SearchEntreprise)){
            $query = $query
                    ->andWhere('r.nomEntreprise LIKE :SearchEntreprise')
                    ->setParameter('SearchEntreprise',"%{$search->SearchEntreprise}%");
        }
        
        return $query->getQuery()->getResult();
    }
    
    // /**
    //  * @return Offre[] Returns an array of Offre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
