<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post",name="api_post",methods={"GET"})
     */
    public function index(OffreRepository $offreRepository): Response
    {

        return $this->json($offreRepository->findAll(),200,[],['groups' => 'offre:read']);
    }
}
