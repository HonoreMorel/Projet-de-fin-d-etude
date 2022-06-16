<?php

namespace App\Controller;

use App\Repository\DinosaurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/search/{value}', name: 'app_search')]
    public function search(DinosaurRepository $repository, $value): Response
    {
        $dinosaurs = $repository -> dinosaurfindByLike($value);

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($dinosaurs, 'json');

        $response=new Response($jsonContent);
        $response->headers->set("Content-type", "application/json");

        return new Response($jsonContent);
        
    }
}
