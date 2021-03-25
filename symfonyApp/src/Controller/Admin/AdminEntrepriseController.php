<?php
namespace App\Controller\Admin;

use App\Entity\Entreprise;
use App\Entity\SecteurDActivite;
use App\Entity\Localite;
use App\Form\EntrepriseType;
use App\Form\SecteurType;
use App\Form\LocaliteType;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function index(Request $request, Request $requestSecteur, Request $requestLocalite) 
    {  
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
        $entreprises = $this->repository->FindEntreprise();
        //dump($entreprises);
        return $this->render("admin/GestionEntreprise.php.twig", ['entreprises' => $entreprises, 'form'=> $form->createView(),'formSecteur'=> $formSecteur->createView(), 'formLocalite'=> $formLocalite->createView()]);
    }
    /**
     * @Route("/admin/entreprise/{id}", name="admin.entreprise.edit", methods="GET|POST")
     * @param Entreprise $entreprises
     * @param Request $request
     * @return \Symfony\Component\httpFoundation\Response
     */

     public function edit(Entreprise $entreprises/*,Localite $localite,SecteurDActivite $Secteur*/, Request $request, Request $requestSecteur, Request $requestLocalite)
     {
        $form = $this->createForm(EntrepriseType::class, $entreprises);
        $form->handleRequest($request);
        //$formLocalite = $this->createForm(LocaliteType::class, $localite);
        //$formLocalite->handleRequest($requestLocalite);
        //$formSecteur = $this->createForm(SecteurType::class, $Secteur);
        //$formSecteur->handleRequest($requestSecteur);

        if($form->isSubmitted() && $form->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->flush();
            $this->addFlash(
            type:'success',
            message:'Modifié avec succès'
            );
            return $this->redirectToRoute(route: 'admin.entreprise');
        }
        /*if($formLocalite->isSubmitted() && $formLocalite->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->flush();
            $this->addFlash(
            type:'success',
            message:'Modifié avec succès'
            );
            return $this->redirectToRoute(route: 'admin.entreprise');
        }*/
        /*if($formSecteur->isSubmitted() && $formSecteur->isValid()){
            $this->em = $this->getDoctrine()->getManager();
            $this->em->flush();
            $this->addFlash(
            type:'success',
            message:'Modifié avec succès'
            );
            return $this->redirectToRoute(route: 'admin.entreprise');
        }*/

        return $this->render('admin/ModifierEntreprise.php.twig', ['entreprises' => $entreprises, /*'formLocalite' => $formLocalite->createView(), 'formSecteur' => $formSecteur->createView(),*/ 'form' => $form->createView()]);
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


}