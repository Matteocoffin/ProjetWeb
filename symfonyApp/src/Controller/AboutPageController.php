<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

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
}