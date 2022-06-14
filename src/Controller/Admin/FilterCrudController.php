<?php

namespace App\Controller\Admin;

use App\Entity\Filter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FilterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Filter::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('filter', 'Filtre'),
            
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-filter')->setLabel('Créer un Filtre');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Création d'un Filtre")
            ->setPageTitle('index', 'Filtres')
            ->showEntityActionsInlined()
            
            ;
    }
    
}
