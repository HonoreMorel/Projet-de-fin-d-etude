<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\Dinosaur;
use App\Controller\Admin\ImageCrudController;
use App\Controller\Admin\ActivityCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use App\Controller\Admin\MoreInformationCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class DinosaurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dinosaur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            FormField::addTab('Nom'), 
            TextField::new('common_name','Nom Commun'),
            TextField::new('scientific_name',"Nom scientifique"),

            FormField::addTab('Fiche tecnique'),
            IntegerField::new('length','Longueur (cm)')->hideOnIndex(),
            IntegerField::new('height','Hauteur (cm)')->hideOnIndex(),
            IntegerField::new('weight','Poids (kg)')->hideOnIndex(),
            ImageField::new('img_height', 'Taille Dinosaure Humain')->setUploadDir('public/img/')->setBasePath('/img/'),
            CollectionField::new('images')->useEntryCrudForm(ImageCrudController::class),
            TextareaField::new('description')->hideOnIndex(),

            FormField::addTab('Information supplémentaire'), 
            ChoiceField::new('period','Période')->setChoices([
                'Crétacé Inférieur'=>'Crétacé Inférieur',
                'Crétacé Supérieur'=>'Crétacé Supérieur',
                'Jurassique Supérieur'=>'Jurassique Supérieur',
                'Jurassique Moyen'=>'Jurassique Moyen',
                'Jurassique Inférieur'=>'Jurassique Inférieur',
                'Trias Supérieur'=>'Trias Supérieur',
                'Trias Moyen'=>'Trias Moyen',
                'Trias Inférieur'=>'Trias Inférieur',
            ]),

            ChoiceField::new('regime','Régime alimentaire')->setChoices([
                'Carnivore'=>'Carnivore',
                'Herbivore'=>'Herbivore',
                'Omnivore'=>'Omnivore',
                'Frugivore'=>'Frugivore',
                'Insectivore'=>'Insectivore',
            ]),
            
            ChoiceField::new('localisation')->setChoices([
                'Amérique du nord'=>'Amérique du nord',
                'Amérique du sud'=>'Amérique du sud',
                'Europe'=>'Europe',
                'Asie'=>'Asie',
            ])->hideOnIndex(),
            
            ChoiceField::new('fossil', 'Fosille')->setChoices([
                'Fossiles pétrifié'=>'Fossiles pétrifié',
                'Moulage interne'=>'Moulage interne',
                'Moulage externe'=>'Moulage externe',
                'Minéralisation'=>'Minéralisation',
                "L'ombre"=>"L'ombre",
            ])->hideOnIndex(),

            AssociationField::new('classification')->hideOnIndex(),

            FormField::addTab("Plus d'informations"),
            CollectionField::new('moreInformation', "Plus d'informations")->useEntryCrudForm(MoreInformationCrudController::class)->hideOnIndex(),
            


        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-hippo')->setLabel('Créer un Dinosaure');
            });
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', "Création d'un Dinosaure")
            ->setPageTitle('index', 'Dinosaures')
            ->showEntityActionsInlined()

            ;
    }

    
}
