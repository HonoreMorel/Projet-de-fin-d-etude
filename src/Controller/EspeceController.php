<?php

namespace App\Controller;

use App\Repository\DinosaurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspeceController extends AbstractController
{
    #[Route('/espece', name: 'app_espece')]
    public function index(DinosaurRepository $dinosaurRepository): Response
    {
        $listDinosaur= $dinosaurRepository->findAll();
        
        return $this->render('espece/index.html.twig', [
            'dinosaurs' => $listDinosaur
        ]);
    }

    #[Route('/espece/{id}', name: 'app_one_espece')]
    public function espece(DinosaurRepository $dinosaurRepository, $id): Response
    {
        $oneDinosaur = $dinosaurRepository->findOneBy(["id"=>$id]);

        $periode= $oneDinosaur->getPeriod();
        $allDinosaurs=$dinosaurRepository->findAll(["period"=>$periode]);
         
       
        return $this->render('espece/espece.html.twig', [
            'oneDinosaur' => $oneDinosaur,
            'contemporains'=>$allDinosaurs
        ]);
    }
}
