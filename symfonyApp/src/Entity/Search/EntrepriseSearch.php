<?php
namespace App\Entity\Search;

use App\Entity\Localite;
use App\Entity\SecteurDActivite;

class EntrepriseSearch {

     /**
     * @var string
     */
    public $s= '';

    /**
     * @var null|integer
     */
    public $idSearch;

     /**
     * @var SecteurDActivite[]
     */
    public $SearchSecteur = [];


    /**
     * @var Localite[]
     */
    public $Searchlocalite = [];

    /**
     * @var null|integer
     */
    public $nbCesi;
}