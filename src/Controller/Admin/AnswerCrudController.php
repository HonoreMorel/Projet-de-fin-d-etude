<?php

namespace App\Controller\Admin;

use App\Entity\Answer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Answer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('answer', 'Réponse')->setColumns('col-lg-12'),
            BooleanField::new('state', "état"),
            TextareaField::new('explication','Explication')->setColumns('col-lg-12'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-reply')->setLabel('Créer une Réponse');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Créer une Réponse')
            ->setPageTitle('index', 'Réponses')
            ->showEntityActionsInlined()
            
            ;
    }

}
