<?php

namespace App\Controller\Admin;

use App\Entity\Subject;
use App\Controller\Admin\QuestionCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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
            TextField::new("subject", "Sujet"),
            CollectionField::new('questions')->useEntryCrudForm(QuestionCrudController::class),
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
            ->setPageTitle('new', 'Ajouter un Quizz')
            ->setPageTitle('index', 'Quizz')
            ->showEntityActionsInlined()
            
            ;
    }

}