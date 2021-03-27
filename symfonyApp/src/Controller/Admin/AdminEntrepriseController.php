<?php
namespace App\Controller\Admin;

use App\Entity\Entreprise;
use App\Entity\Evaluation;
use App\Entity\SecteurDActivite;
use App\Entity\Localite;
use App\Entity\Search\EntrepriseSearch;
use App\Form\EntrepriseSearchType;
use App\Form\EntrepriseType;
use App\Form\EvaluerType;
use App\Form\SecteurType;
use App\Form\LocaliteType;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AdminEntrepriseController extends AbstractController
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
     * @Route("/admin/entreprise", name="admin.entreprise")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function index(PaginatorInterface $paginator,Request $request, Request $requestSecteur, Request $requestLocalite, Request $requestSearch) 
    { 
        $search = new EntrepriseSearch();
        $formSearch = $this->createForm(EntrepriseSearchType::class,$search);
        $formSearch->handleRequest($requestSearch);
        $localite = new Localite();
        $entreprise = new Entreprise();
        $Secteur = new SecteurDActivite();
        $formLocalite = $this->createForm(LocaliteType::class, $localite);
        $formLocalite->handleRequest($requestLocalite);
        $formSecteur = $this->createForm(SecteurType::class, $Secteur);
        $formSecteur->handleRequest($requestSecteur);
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($entreprise);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.entreprise');
        }
        if($formSecteur->isSubmitted() && $formSecteur->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($Secteur);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.entreprise');
        }
        if($formLocalite->isSubmitted() && $formLocalite->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($localite);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.entreprise');
        }
        $entreprises = $paginator->paginate($this->repository->FindEntrepriseQuery($search), $request->query->getInt('page', 1), 2);
        return $this->render("admin/GestionEntreprise.php.twig", ['entreprises' => $entreprises, 'form'=> $form->createView(),'formSecteur'=> $formSecteur->createView(), 'formLocalite'=> $formLocalite->createView(), 'formSearch' => $formSearch->createView()]);
    }
    /**
     * @Route("/admin/entreprise/{id}", name="admin.entreprise.edit", methods="GET|POST")
     * @param Entreprise $entreprises
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */

     public function edit(Entreprise $entreprises, Request $request)
     {
        $form = $this->createForm(EntrepriseType::class, $entreprises);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->flush();
            $this->addFlash(
            type:'success',
            message:'Modifié avec succès'
            );
            return $this->redirectToRoute(route: 'admin.entreprise');
        }
        return $this->render('admin/ModifierEntreprise.php.twig', ['entreprises' => $entreprises, 'form' => $form->createView()]);
     }
     /**
     * @Route("/admindel/entreprise/{id}", name="admin.entreprise.delete", methods="DELETE")
     * @param Entreprise $entreprises
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function delete(Entreprise $entreprises, Request $request)
    {
        //Pour sécuriser la methode delete a l'aide de la vérification des tokens
        if($this->isCsrfTokenValid('delete' . $entreprises->getIdEntreprise(), $request->get(key:'_token')))
        {
            $this->em = $this->getDoctrine()->getManager();
            $this->em->remove($entreprises);
            $this->em->flush();
            $this->addFlash(
                type:'success',
                message:'Supprimé avec succès'
                );
        }
        return $this->redirectToRoute(route: 'admin.entreprise');
    }


    /**
     * @Route("/pilote/entreprise/evaluer", name="Evaluer")
     */
    public function evaluer( Request $request)
    {
        $evaluer = new Evaluation();
        $form = $this->createForm(EvaluerType::class, $evaluer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $evaluer->setIdUtilisateur($user = $this->getUser());
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($evaluer);
            $this->em->flush();
            return $this->redirectToRoute(route: 'Evaluer');
        }
        
        return $this->render('pilote/Evaluation.html.twig', ['evaluer' => $evaluer, 'form' => $form->createView()]);
    }


}   