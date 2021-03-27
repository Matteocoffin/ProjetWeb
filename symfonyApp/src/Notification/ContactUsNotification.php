<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactNotification extends AbstractController {
    public function notify(Contact $contact){
        $mailer = new MailerInterface();
        $email = (new Email())
            ->from('noreply@agence.fr')
            ->to('contact@agence.fr')
            ->replyTo($contact->email)
            ->subject($contact->sujet)
            ->text($contact->message)
            ->html('emails/contact_annonce.html.twig');
        $mailer->send($email);
    }
}