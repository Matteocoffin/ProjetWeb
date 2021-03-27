<?php
namespace App\Controller\Admin;

use App\Entity\Competences;
use App\Entity\Offre;
use App\Entity\Search\OffreGSearch;
use App\Form\OffreGSearchType;
use App\Entity\Entreprise;
use App\Form\CompetenceType;
use App\Form\EntrepriseType;
use App\Form\OffreType;
use App\Repository\CompetenceRepository;
use App\Repository\OffreRepository;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AdminOffreController extends AbstractController
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
     * @Route("/admin/offre", name="admin.offre")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function index(PaginatorInterface $paginator,Request $request, Request $requestCompetence, Request $requestSearch) 
    {
        //$entreprise = new Entreprise();
        $search = new OffreGSearch();
        $formSearch = $this->createForm(OffreGSearchType::class,$search);
        $formSearch->handleRequest($requestSearch);
        $offre = new Offre();
        $Competence = new Competences();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);
        $formCompetence= $this->createForm(CompetenceType::class, $Competence);
        $formCompetence->handleRequest($requestCompetence);
        //$formEntreprise = $this->createForm(EntrepriseType::class, $entreprise);
        //$formEntreprise->handleRequest($requestEntreprise);
        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($offre);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.offre');
        }
        //if($formEntreprise->isSubmitted() && $formEntreprise->isValid()){
        //    $this->em = $this->getDoctrine()->getManager();
        //    $this->em->persist($entreprise);
        //    $this->em->flush();
        //    return $this->redirectToRoute(route: 'admin.offre');
        //}
        if($formCompetence->isSubmitted() && $formCompetence->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($Competence);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.offre');
        }
        $offre = $paginator->paginate($this->repository->FindOffreGQuery($search), $request->query->getInt('page', 1), 2);
        dump($offre);
        return $this->render("admin/GestionOffre.php.twig", ['offre' => $offre, 'formCompetence'=> $formCompetence->createView(), 'form'=> $form->createView(), 'formSearch' => $formSearch->createView()]);
    }

    /**
     * @Route("/admin/offre/{id}", name="admin.offre.edit", methods="GET|POST")
     * @param Offre $offre
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */

    public function edit(Offre $offre,Competences $Competence, Request $request, Request $requestCompetence)
    {
       $form = $this->createForm(OffreType::class, $offre);
       $form->handleRequest($request);
       $formCompetence= $this->createForm(CompetenceType::class, $Competence);
       $formCompetence->handleRequest($requestCompetence);

       if($form->isSubmitted() && $form->isValid()){
           $this->em = $this->getDoctrine()->getManager();
           $this->em->flush();
           $this->addFlash(
           type:'success',
           message:'Modifié avec succès'
           );
           return $this->redirectToRoute(route: 'admin.offre');
       }
       if($formCompetence->isSubmitted() && $formCompetence->isValid()){
        $this->em = $this->getDoctrine()->getManager();
        $this->em->flush();
        $this->addFlash(
        type:'success',
        message:'Modifié avec succès'
        );
        return $this->redirectToRoute(route: 'admin.offre');
    }

       return $this->render('admin/ModifierOffre.php.twig', ['offre' => $offre, 'form' => $form->createView(),'formCompetence'=> $formCompetence->createView()]);
    }
    /**
    * @Route("/admindel/offre/{id}", name="admin.offre.delete", methods="DELETE")
    * @param Offre $offre
    * @param Request $request
    * @return \Symfony\Component\httpFoundation\Response
    */
   public function delete(Offre $offre, Request $request)
   {
       //Pour sécuriser la methode delete a l'aide de la vérification des tokens
       if($this->isCsrfTokenValid('delete' . $offre->getIdOffre(), $request->get(key:'_token')))
       {
           $this->em = $this->getDoctrine()->getManager();
           $this->em->remove($offre);
           $this->em->flush();
           $this->addFlash(
               type:'success',
               message:'Supprimé avec succès'
               );
       }
       return $this->redirectToRoute(route: 'admin.offre');
   }
}