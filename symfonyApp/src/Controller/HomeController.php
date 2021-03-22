<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{

    /**
     * @var EntrepriseRepository    
     */
    private $repository;

    public function __construct(EntrepriseRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/",name="home")
     * @return Response
    */
    public function index(): Response
    {
        $entreprises = $this->repository->findLastest();
        return $this->render('Pages/home.php.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    /**
     * @Route("/offre/{slug}-{id}",name="voiroffre", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show($slug,$id): Response
    {
        $entreprises = $this->repository->find($id);
        return $this->render('Pages/ShowOffre.php.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}