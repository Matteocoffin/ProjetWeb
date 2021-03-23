<?php
namespace App\Controller\Admin;

use App\Entity\Offre;
use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function index(Request $request, Request $requestEntreprise) 
    {
        $entreprise = new Entreprise();
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);
        $formEntreprise = $this->createForm(EntrepriseType::class, $entreprise);
        $formEntreprise->handleRequest($requestEntreprise);
        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($offre);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.offre');
        }
        if($formEntreprise->isSubmitted() && $formEntreprise->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($entreprise);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.offre');
        }
        $offre = $this->repository->FindOffre();
        dump($offre);
        return $this->render("admin/GestionOffre.php.twig", ['offre' => $offre, 'form'=> $form->createView(),'formEntreprise'=> $formEntreprise->createView()]);
    }

    /**
     * @Route("/admin/offre/{id}", name="admin.offre.edit", methods="GET|POST")
     * @param Offre $offre
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */

    public function edit(Offre $offre, Request $request)
    {
       $form = $this->createForm(OffreType::class, $offre);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $this->em = $this->getDoctrine()->getManager();
           $this->em->flush();
           $this->addFlash(
           type:'success',
           message:'Modifié avec succès'
           );
           return $this->redirectToRoute(route: 'admin.offre');
       }

       return $this->render('admin/ModifierOffre.php.twig', ['offre' => $offre, 'form' => $form->createView()]);
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