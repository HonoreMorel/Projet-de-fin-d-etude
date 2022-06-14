<?php

namespace App\Controller\Admin;

use App\Entity\Subject;
use App\Controller\Admin\QuestionCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SubjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Subject::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Sujet'),
            TextField::new("subject", "Sujet"),
            FormField::addTab('Questions'),
            CollectionField::new('questions')->useEntryCrudForm(QuestionCrudController::class)->setColumns('col-lg-12'),
        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-heading')->setLabel('Créer un Quizz');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Créer un Quizz')
            ->setPageTitle('index', 'Créer un Quizz');
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            
            // it's equivalent to adding this inside the <head> element:
            // <link rel="stylesheet" href="{{ asset('...') }}">
            ->addCssFile('/admin/css/questioncrudcontroller.css')
            

            

          
        ;
    }
}