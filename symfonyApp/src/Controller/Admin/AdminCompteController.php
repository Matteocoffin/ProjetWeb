<?php
namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Type;
use App\Entity\Centre;
use App\Entity\Promo;
use App\Form\UtilisateurType;
use App\Form\TypeType;
use App\Form\CentreType;
use App\Form\PromoType;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCompteController extends AbstractController
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
     * @Route("/admin/Compte", name="admin.Compte")
     * @return \Symfony\Component\httpFoundation\Response
     */
    public function index(Request $request, Request $requestType, Request $requestCentre, Request $requestPromo)
    {
        $Utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $Utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($Utilisateur);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.Compte');
        }

        $Utilisateur = $this->repository->FindUtilisateur();
        dump($Utilisateur);
        return $this->render("admin/GestionCompte.php.twig", ['Utilisateur' => $Utilisateur, 'form'=> $form->createView()]);
    }

    /**
     * @Route("/admin/Compte/{id}", name="admin.compte.edit", methods="GET|POST")
     * @param Utilisateur $Utilisateur
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */

    public function edit(Utilisateur $Utilisateur, Request $request)
    {
       $form = $this->createForm(UtilisateurType::class, $Utilisateur);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $this->em = $this->getDoctrine()->getManager();
           $this->em->flush();
           $this->addFlash(
           type:'success',
           message:'Modifié avec succès'
           );
           return $this->redirectToRoute(route: 'admin.Compte');
       }

       return $this->render('admin/ModifierOffre.php.twig', ['Utilisateur' => $Utilisateur, 'form' => $form->createView()]);
    }


    /**
    * @Route("/admindel/Compte/{id}", name="admin.compte.delete", methods="DELETE")
    * @param Utilisateur $Utilisateur
    * @param Request $request
    * @return \Symfony\Component\httpFoundation\Response
    */
   public function delete(Utilisateur $Utilisateur, Request $request)
   {
       //Pour sécuriser la methode delete a l'aide de la vérification des tokens
       if($this->isCsrfTokenValid('delete' . $Utilisateur->getIdUtilisateur(), $request->get(key:'_token')))
       {
           $this->em = $this->getDoctrine()->getManager();
           $this->em->remove($Utilisateur);
           $this->em->flush();
           $this->addFlash(
               type:'success',
               message:'Supprimé avec succès'
               );
       }
       return $this->redirectToRoute(route: 'admin.Compte');
   }
}