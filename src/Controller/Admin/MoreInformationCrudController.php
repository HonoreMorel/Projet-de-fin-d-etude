<?php

namespace App\Controller\Admin;

use App\Entity\MoreInformation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoreInformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoreInformation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        
            TextField::new('title', 'Titre'),
            ImageField::new('image')->setUploadDir('public/img/')->setBasePath('img/'),
            TextEditorField::new('description', 'Description'),
            TextField::new('alt','Texte alternatif'),
            
        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-info')->setLabel("Ajouter des d'informations");
            });
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Ajouter des d'informations")
            ->setPageTitle('index', "Plus d'informations")
            ->showEntityActionsInlined()
            
            ;
    }
}
