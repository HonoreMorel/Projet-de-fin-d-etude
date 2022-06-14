<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Controller\Admin\ScoreCrudController;
use App\Controller\Admin\SubjectCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Email')->setDisabled(true),
            ArrayField::new('roles'),
            TextField::new('nickname', 'Nom')->setDisabled(true),
            ImageField::new('photo', 'Image de Profil')->setUploadDir('public/img/')->setBasePath('/img/')->setDisabled(true),
            CollectionField::new('scores', 'Scores')->useEntryCrudForm(ScoreCrudController::class)->allowAdd(false)->allowDelete(false)->setDisabled(true),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        /* On elève le bouton d'ajout d'utilisateur dans le backOffice */
        return $actions->disable(Action::NEW);
            
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Utilisateurs 👥')
            ->setPageTitle('edit', 'Modifier un Utilisateur 👤')
            ->showEntityActionsInlined()
            
            ;
    }
    

}