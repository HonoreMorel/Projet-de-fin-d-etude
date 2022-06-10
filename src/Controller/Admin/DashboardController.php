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
        yield MenuItem::linkToRoute('Accueil du site',"fa-solid fa-house", 'app_home');
        
        
        yield MenuItem::section('Utilisateur');
        yield MenuItem::linkToCrud('User', "fa-solid fa-user-gear", User::class);

        yield MenuItem::section('Dinosaure');
        yield MenuItem::linkToCrud('Dinosaur', "fa-solid fa-hippo", Dinosaur::class);
        yield MenuItem::linkToCrud('Media', "fa-solid fa-photo-film", Media::class);
        yield MenuItem::linkToCrud('Classification',"fa-solid fa-magnifying-glass", Classification::class);
        yield MenuItem::linkToCrud('Timeline', "fa-solid fa-timeline", Timeline::class);
        
        yield MenuItem::section('Jeux');
        yield MenuItem::linkToCrud('Game', "fa-solid fa-gamepad", Game::class);
        yield MenuItem::linkToCrud('Subject', "fa-solid fa-heading", Subject::class);
        yield MenuItem::linkToCrud('Question', "fa-solid fa-circle-question", Question::class);
        yield MenuItem::linkToCrud('Answer', "fa-solid fa-reply", Answer::class);
        
        yield MenuItem::section('Event');
        yield MenuItem::linkToCrud('Event', "fa-regular fa-calendar-days", Event::class);
        yield MenuItem::linkToCrud('Activity', 'fas fa-list', Activity::class);
        yield MenuItem::linkToCrud('Filter', "fa-solid fa-filter", Filter::class);
    }
}
