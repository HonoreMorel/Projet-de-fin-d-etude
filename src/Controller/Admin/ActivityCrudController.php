<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use App\Controller\Admin\FilterCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActivityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title','Titre'),
            TextareaField::new('description','Description')->hideOnIndex(),
            TextField::new('language', 'Langue'),
            TextField::new('place', 'Lieu'),
            IntegerField::new('average_duration', 'Durée moyenne (jours)'),
            IntegerField::new('tarif', 'Tarif (€)'),
            AssociationField::new('filter', 'Filtres')->setCrudController(FiterCrudController::class),




        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-list')->setLabel('Créer une activité');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Création d'une activité")
            ->setPageTitle('index', 'Activités')
            ->showEntityActionsInlined()
            
            ;
    }
}
