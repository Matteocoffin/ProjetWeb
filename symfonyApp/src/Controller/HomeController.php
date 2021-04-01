<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Offre;
use App\Entity\Search\OffreSearch;
use App\Entity\WishList;
use App\Form\ContactType;
use App\Form\OffreSearchType;
use App\Repository\OffreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;


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
     * @Route("/home",name="home")
     * @return Response
    */
    public function index(PaginatorInterface $paginator, Request $request, Request $requestSearch): Response
    {
        $search = new OffreSearch();
        $form = $this->createForm(OffreSearchType::class,$search);
        $form->handleRequest($requestSearch);
        $Offre = $paginator->paginate($this->repository->FindOffreQuery($search), $request->query->getInt('page', 1), 2);
        return $this->render('Pages/home.html.twig', [
            'Offre' => $Offre,
            'form' => $form->createView()
        ]);
    }
//|date('d/m/Y')
    /**
     * @Route("/offre/{slug}-{id}",name="voiroffre", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show($slug,$id,MailerInterface $mailer,Request $requestSearch): Response
    {
        $Offre = $this->repository->find($id);
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($requestSearch);
        if($form->isSubmitted() && $form->isValid()){
            dump($contact->email);
            $email = (new TemplatedEmail())
                    ->from($contact->email)
                    ->to('contact@agence.fr')
                    ->subject($contact->sujet)
                    ->htmlTemplate('emails/contactStage.html.twig')
                    ->context([
                        'text' => $contact->message,
                        'stage' => $Offre->getTitre(),
                        'datedebut' => ($Offre->getDebutStage())->format('d/m/Y'),
                        'datefin' => ($Offre->getFinStage())->format('d/m/Y'),
                        'mail' => $contact->email,
                        'nom' => $contact->lastname,
                        'prenom' => $contact->firstname,
                    ]);
            $mailer->send($email);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            return $this->redirectToRoute(route: 'home');
        }
        return $this->render('Pages/ShowOffre.html.twig', [
            'offre' => $Offre,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/offre/addWish/{slug}-{id}",name="add.wishlist", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function addwish(Offre $id)
    {
        $wishlist = new WishList();
        $wishlist->setIdOffre($id);
        $wishlist->setIdUtilisateur($user = $this->getUser());
        $this->em = $this->getDoctrine()->getManager();
        $this->em->persist($wishlist);
        $this->em->flush();
        return $this->redirectToRoute(route: 'home');   
    }
}   