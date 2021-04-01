<?php
namespace App\Controller\Admin;

use App\Entity\Search\OffreSearch;
use App\Form\OffreSearchType;
use App\Repository\OffreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AdminStatEntreOffreController extends AbstractController
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
     * @Route("/admin/Statoffre", name="admin.Statoffre")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function index(PaginatorInterface $paginator, Request $requestSearch, Request $request)
    {
        $search = new OffreSearch();
        $form = $this->createForm(OffreSearchType::class,$search);
        $form->handleRequest($requestSearch);
        $Offre = $paginator->paginate($this->repository->FindOffreQuery($search), $request->query->getInt('page', 1), 2);
        return $this->render('Admin/StatEntreOffre.html.twig', [
            'Offre' => $Offre,
            'form' => $form->createView()
        ]);
    }
}