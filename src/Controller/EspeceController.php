<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspeceController extends AbstractController
{
    #[Route('/espece', name: 'app_espece')]
    public function index(): Response
    {
        return $this->render('espece/index.html.twig', [
            'controller_name' => 'EspeceController',
        ]);
    }

    #[Route('/espece/{id}', name: 'app_one_espece')]
    public function espece(): Response
    {
        return $this->render('espece/espece.html.twig', [
            'controller_name' => 'EspeceController',
        ]);
    }
}
