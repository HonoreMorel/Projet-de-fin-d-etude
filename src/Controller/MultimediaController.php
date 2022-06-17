<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultimediaController extends AbstractController
{
    #[Route('/multimedia', name: 'app_multimedia')]
    public function index(): Response
    {
        return $this->render('multimedia/index.html.twig', [
            'controller_name' => 'MultimediaController',
        ]);
    }
}
