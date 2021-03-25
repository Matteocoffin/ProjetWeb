<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Repository\OffreRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{

    /**
     * @var OffreRepository    
     */
    private $repository;

    public function __construct(OffreRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/",name="home")
     * @return Response
    */
    public function index(): Response
    {
        $Offre = $this->repository->findOffre();
        dump($Offre);
        return $this->render('Pages/home.php.twig', [
            'Offre' => $Offre,
        ]);
    }

    /**
     * @Route("/offre/{slug}-{id}",name="voiroffre", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show($slug,$id): Response
    {
        $Offre = $this->repository->find($id);
        return $this->render('Pages/ShowOffre.php.twig', [
            'offre' => $Offre,
        ]);
    }
}