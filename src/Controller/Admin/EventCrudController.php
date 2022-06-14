<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title','Titre'),
            ImageField::new('image')->setUploadDir('public/img/')->setBasePath('/img/'),
            TextEditorField::new('description','Description'),
            TextField::new('url', 'Lien'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-regular fa-calendar-days')->setLabel('Créer un événement');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Création d'événement")
            ->setPageTitle('index', 'Événements')
            ->showEntityActionsInlined()
            
            ;
    }
    
}
