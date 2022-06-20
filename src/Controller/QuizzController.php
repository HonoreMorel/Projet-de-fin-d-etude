<?php

namespace App\Controller;

use App\Entity\Score;
use App\Entity\Subject;
use App\Repository\GameRepository;
use App\Repository\ScoreRepository;
use App\Repository\AnswerRepository;
use App\Repository\SubjectRepository;
use App\Repository\QuestionRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{
    #[Route('/quizz', name: 'app_quizz')]
    public function index(SubjectRepository $subjectRepository, GameRepository $gameRepository): Response
    {
        $listGame= $gameRepository->findAll();
        $listSubjects = $subjectRepository->findAll();
        
        return $this->render('quizz/index.html.twig', [
            'subjects' => $listSubjects,
            'games'    =>$listGame
        ]);
    }

    #[Route('/quizz/{id}', name: 'app_quizz_template')]
    public function quizzTemplate(): Response
    {

        return $this->render('quizz/quizz.html.twig');
    }

    #[Route('/questions/{id}', name: 'app_questions')]
    public function questions(QuestionRepository $questionRepository,AnswerRepository $answerRepository, $id): JsonResponse
    {

        $listQuestions = $questionRepository->findBy(array("subject"=>$id));
        /* 
        dd($listQuestions);
        $response = json_encode($listQuestions);
        return $response; */

        $results = [];
        
        foreach ($listQuestions as $result) {
            $results[] = [
              'id'=>$result->getId(),
              'statement'    => $result->getStatement(),
              'image' => $result->getImage(),
              'explication'=>$result->getExplication(),
              'answers'=>$this->getAnswer($answerRepository, $result->getId())
              
            ];
            
        }
        return new JsonResponse($results);

        /* return $this->render('quizz/quizz.html.twig', [
            'questions' => $listQuestions,
        ]); */
    }

    function getAnswer($repository, $id){
        $listAnswers = $repository->findBy(array("question"=>$id));
        
        $results = [];
        
        foreach ($listAnswers as $result) {
            $results[] = [
              'id'=>$result->getId(),
              'answer'    => $result->getAnswer(),
              'state' => $result->isState(),
              
            ];
        
    
    }
           
        return $results;

}
        #[Route('/savescore/{id_subject}/{score_user}', name: 'app_save_score')]
            public function savescore(ManagerRegistry $doctrine, ?UserInterface $userInterface,int $id_subject, int $score_user): Response
            {
                if ($userInterface!=null){
                    $entityManager =$doctrine->getManager();
                    $scoreUser=new Score();
                    $subject=$entityManager->getRepository(Subject::class)->find($id_subject);
                    $scoreUser->setSubject($subject);
                    //dd($score_user);
                    $scoreUser->setScore($score_user);
                    $scoreUser->setUser($userInterface);
                    $entityManager->persist($scoreUser);
                    $entityManager->flush();
                    return new Response('score ajouté');

                }else{
                    return new Response('Personne non conectée');
                }
               

                
                
            }

            


}
