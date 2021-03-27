<?php
namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Search\EtudiantSearch;
use Knp\Component\Pager\PaginatorInterface;
use App\Form\EtudiantSearchType;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class AdminStatEtudiantController extends AbstractController 
{
    /**
     * @var UtilisateurRepository
     */
    private $repository;

    public function __construct(UtilisateurRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route("/admin/CompteEtudiant", name="admin.CompteEtudiant")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function index(Request $request,Request $requestSearch,PaginatorInterface $paginator)
    {
        $search = new EtudiantSearch();
        $formSearch = $this->createForm(EtudiantSearchType::class,$search);
        $formSearch->handleRequest($requestSearch);
        $Utilisateur = new Utilisateur();
        $Utilisateur = $paginator->paginate($this->repository->FindEtudiantQuery($search), $request->query->getInt('page', 1), 2);
        dump($Utilisateur);
        return $this->render("admin/StatEtudiant.php.twig", ['Utilisateur' => $Utilisateur,'formSearch' => $formSearch->createView()]);
    }
}