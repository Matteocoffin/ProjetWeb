<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Search\OffreSearch;
use App\Form\OffreSearchType;
use App\Repository\OffreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(PaginatorInterface $paginator, Request $request, Request $requestSearch): Response
    {
        $search = new OffreSearch();
        $form = $this->createForm(OffreSearchType::class,$search);
        $form->handleRequest($requestSearch);
        $Offre = $paginator->paginate($this->repository->FindOffreQuery($search), $request->query->getInt('page', 1), 2);
        dump($Offre);
        return $this->render('Pages/home.php.twig', [
            'Offre' => $Offre,
            'form' => $form->createView()
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