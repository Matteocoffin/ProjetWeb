<?php
namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Search\CompteSearch;
use App\Form\UtilisateurType;
use Knp\Component\Pager\PaginatorInterface;
use App\Form\CompteSearchType;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function index(Request $request,Request $requestSearch, UserPasswordEncoderInterface $encoder,PaginatorInterface $paginator)
    {
        $search = new CompteSearch();
        $formSearch = $this->createForm(CompteSearchType::class,$search);
        $formSearch->handleRequest($requestSearch);
        $Utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $Utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($Utilisateur, $Utilisateur->getMdp());
            $Utilisateur->setMdp($hash);
            $this->em = $this->getDoctrine()->getManager();
            $this->em->persist($Utilisateur);
            $this->em->flush();
            return $this->redirectToRoute(route: 'admin.Compte');
        }
        $Utilisateur = $paginator->paginate($this->repository->FindUtilisateurQuery($search), $request->query->getInt('page', 1), 2);
        //dump($Utilisateur);
        return $this->render("admin/GestionCompte.html.twig", ['Utilisateur' => $Utilisateur, 'form'=> $form->createView(),'formSearch' => $formSearch->createView()]);
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

       return $this->render('admin/ModifierCompte.html.twig', ['Utilisateur' => $Utilisateur, 'form' => $form->createView()]);
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