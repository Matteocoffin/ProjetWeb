<?php
namespace App\Entity\Search;

use App\Entity\Type;
use App\Entity\Promo;
use App\Entity\Centre;
class CompteSearch {
    /**
     * @var string
     */
    public $s= '';

    /**
     * @var null|integer
     */
    public $idSearch;

    /**
     * @var Type[]
     */
    public $SearchType = [];

    /**
     * @var Promo[]
     */
    public $SearchPromo = [];

    /**
     * @var Centre[]    
     */
    public $SearchCentre = [];

}