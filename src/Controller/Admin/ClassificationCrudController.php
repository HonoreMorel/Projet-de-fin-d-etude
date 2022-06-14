<?php

namespace App\Controller\Admin;

use App\Entity\Classification;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClassificationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Classification::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('classification','Classification'),
            
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-magnifying-glass')->setLabel('Créer une Classification');
            });
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Création d'une Classification")
            ->setPageTitle('new', "Modifier la Classification")
            ->showEntityActionsInlined()

            ;
    }

}
