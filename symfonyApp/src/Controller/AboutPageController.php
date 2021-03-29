<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class AboutPageController extends AbstractController
{

    /**
     * @Route("/about",name="About")
     * @return Response
    */
    public function index(): Response
    {
        return $this->render(view:'Pages/AboutPage.php.twig');
    }

    /**
     * @Route("/ContactUs",name="ContactUs")
     * @return Response
    */
    public function ContactUs(Request $requestSearch,MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($requestSearch);
        if($form->isSubmitted() && $form->isValid()){
            dump($contact->email);
            $email = (new TemplatedEmail())
                    ->from($contact->email)
                    ->to('contact@agence.fr')
                    ->subject($contact->sujet)
                    ->htmlTemplate('emails/contact.html.twig')
                    ->context([
                        'text' => $contact->message,
                        'mail' => $contact->email,
                        'nom' => $contact->lastname,
                        'prenom' => $contact->firstname,
                        'sujet' => $contact->sujet
                    ]);
            $mailer->send($email);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            return $this->redirectToRoute(route: 'ContactUs');
        }
        return $this->render('Pages/ContactUs.html.twig', ['form' => $form->createView()]);
    }
}