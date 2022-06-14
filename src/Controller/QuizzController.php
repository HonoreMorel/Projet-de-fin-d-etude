<?php

namespace App\Controller;

use App\Repository\SubjectRepository;
use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{
    #[Route('/quizz', name: 'app_quizz')]
    public function index(SubjectRepository $subjectRepository): Response
    {

        $listSubjects = $subjectRepository->findAll();

        return $this->render('quizz/index.html.twig', [
            'subjects' => $listSubjects,
        ]);
    }

    #[Route('/questions/{id}', name: 'app_questions')]
    public function questions(QuestionRepository $questionRepository, $id): Response
    {

        $listQuestions = $questionRepository->findBy(array("subject"=>$id));
        

        return $this->render('quizz/quizz.html.twig', [
            'questions' => $listQuestions,
        ]);
    }
}
