<?php
namespace App\Entity\Search;

use App\Entity\Localite;
use App\Entity\Competences;
use App\Entity\Entreprise;

class OffreSearch {

    /**
     * @var string
     */
    public $s= '';

     /**
     * @var Competences[]
     */
    public $SearchCompetences = [];


    /**
     * @var Localite[]
     */
    public $Searchlocalite = [];


    /**
     * @var Entreprise[]
     */
    public $SearchEntreprise = [];

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var null|integer
     */
    public $min;













    /**
     * @return int|null
     */
    //public function getmaxRemuneration(): ?int
   // {
    //    return $this->maxRemuneration;
    //}

    /**
     * @param int|null $maxRemuneration
     * @return OffreSearch
     */
    //public function setmaxRemuneration(int $maxRemuneration): OffreSearch
    //{
    //    $this->maxRemuneration = $maxRemuneration;
    //    return $this;
   // }
}