<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementsController extends AbstractController
{
    #[Route('/evenements', name: 'app_evenements')]
    public function index(EventRepository $eventRepository): Response
    {

        $events = $eventRepository->findAll();
    
        return $this->render('evenements/index.html.twig', [
            'events' => $events,
        ]);
    }
}
