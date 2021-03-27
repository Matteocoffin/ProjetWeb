<?php
namespace App\Entity\Search;

use App\Entity\Promo;
use App\Entity\Centre;
class EtudiantSearch {
    /**
     * @var string
     */
    public $s='';

    /**
     * @var Promo[]
     */
    public $SearchPromo = [];

    /**
     * @var Centre[]    
     */
    public $SearchCentre = [];

    

}