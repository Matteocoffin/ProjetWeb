<?php

namespace App\Repository;

use App\Entity\Entreprise;
use App\Entity\Search\EntrepriseSearch;
use App\Entity\SecteurDActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entreprise[]    findAll()
 * @method Entreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreprise::class);
    }

    //public function findAllVisible()
    //{
    //    return $this->createQueryBuilder(alias:'p')
    //                ->where(predicates:'p.date = false')
    //                ->getQuery()
    //                ->getResult();
    //}
    /**
     * @return Entreprise[]
     */
    public function findLastest()
    {
        return $this->createQueryBuilder(alias:'p')
                    ->setMaxResults(maxResults:10)
                    ->getQuery()
                    ->getResult();
    }
    public function FindEntreprise()
    {
        return $this->createQueryBuilder(alias:'c')
                    ->join('c.idSecteur','r')
                    ->join('c.idLocalite','t')
                    ->addSelect('r','t')
                    ->getQuery()
                    ->getResult();
    }


    /**
     * @return Entreprise[]
     */
    public function FindEntrepriseQuery(EntrepriseSearch $search): array
    {
        $query = $this->createQueryBuilder(alias:'c')
                    ->join('c.idSecteur','r')
                    ->join('c.idLocalite','t')
                    ->addSelect('r')
                    ->addSelect('t');
        if(!empty($search->s)){
            $query = $query
                    ->andWhere('c.nomEntreprise LIKE :s')
                    ->setParameter('s',"%{$search->s}%");
        }
        if(!empty($search->nbCesi)){
            $query = $query
                    ->andWhere('c.nbDeStagiairesCesi = :nbCesi')
                    ->setParameter('nbCesi',"$search->nbCesi");
        }
        if(!empty($search->idSearch)){
            $query = $query
                    ->andWhere('c.idOffre = :idSearch')
                    ->setParameter('idSearch',$search->idSearch);
        }
        if(!empty($search->Searchlocalite)){
            $query = $query
                    ->andWhere('t.region LIKE :Searchlocalite')
                    ->setParameter('Searchlocalite',"%{$search->Searchlocalite}%");
        }

        if(!empty($search->SearchSecteur)){
            $query = $query
                    ->andWhere('r.secteurDActivite LIKE :SearchSecteur')
                    ->setParameter('SearchSecteur',"%{$search->SearchSecteur}%");
        }
        return $query->getQuery()->getResult();

    }
    
    // /**
    //  * @return Entreprise[] Returns an array of Entreprise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entreprise
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
