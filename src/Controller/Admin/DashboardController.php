<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\Media;
use App\Entity\Filter;
use App\Entity\Activity;
use App\Entity\Dinosaur;
use App\Entity\Timeline;
use App\Entity\Classification;

use App\Entity\User;
use App\Entity\Subject;
use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\Score;
use App\Entity\Game;






use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\DinosaurCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(DinosaurCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dinoscopia');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Acceuil', 'fa-solid fa-moon', 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Activity', 'fas fa-list', Activity::class);
        yield MenuItem::linkToCrud('Classification',"fa-solid fa-magnifying-glass", Classification::class);
        yield MenuItem::linkToCrud('Dinosaur', "fa-solid fa-hippo", Dinosaur::class);
        yield MenuItem::linkToCrud('Event', 'fas fa-list', Event::class);
        yield MenuItem::linkToCrud('Filter', 'fas fa-list', Filter::class);
        yield MenuItem::linkToCrud('Media', 'fas fa-list', Media::class);
        yield MenuItem::linkToCrud('Timeline', 'fas fa-list', Timeline::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Subject', 'fas fa-list', Subject::class);
        yield MenuItem::linkToCrud('Question', 'fas fa-list', Question::class);
        yield MenuItem::linkToCrud('Answer', 'fas fa-list', Answer::class);
        yield MenuItem::linkToCrud('Score', 'fas fa-list', Score::class);
        yield MenuItem::linkToCrud('Game', 'fas fa-list', Game::class);


    }
}
