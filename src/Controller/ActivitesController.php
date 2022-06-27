<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActivitesController extends AbstractController
{
    #[Route('/activites', name: 'app_activites')]
    public function index(ActivityRepository $activityRepository): Response
    {
        $listActivities= $activityRepository->findAll();
    

        return $this->render('activites/index.html.twig', [
            'activities' => $listActivities,
        ]);
    }
}
