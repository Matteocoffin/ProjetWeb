<?php

namespace App\DataFixtures;

use App\Entity\Offre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OffreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i = 0; $i<100; $i++){
            $offre = new Offre();
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
