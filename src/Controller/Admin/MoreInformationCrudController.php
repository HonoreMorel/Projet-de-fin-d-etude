<?php

namespace App\Controller\Admin;

use App\Entity\MoreInformation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
        
            TextField::new('title', 'Titre')->setColumns(12),
            ImageField::new('image')->setUploadDir('public/img/')->setBasePath('img/')->setColumns(12)->addCssClass('changewidth'),
            TextareaField::new('description', 'Description')->setColumns(12),
            TextField::new('alt','Texte alternatif')->setColumns(12),
            
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
