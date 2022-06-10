<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\Dinosaur;
use App\Controller\Admin\ActivityCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
            
            TextField::new('common_name','Nom Commun'),
            TextField::new('scientific_name',"Nom scientifique"),
            IntegerField::new('length','Longuer'),
            IntegerField::new('height','Hauteur'),
            IntegerField::new('weight','Poids'),
            
            TextareaField::new('description'),
            CollectionField::new('images')->setEntryType(ImageType::class),
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
                
            ]),
            ChoiceField::new('fossil', 'Fosille')->setChoices([
                'Fossiles pétrifié'=>'Fossiles pétrifié',
                'Moulage interne'=>'Moulage interne',
                'Moulage externe'=>'Moulage externe',
                'Minéralisation'=>'Minéralisation',
                "L'ombre"=>"L'ombre",
            ]),
            AssociationField::new('classification')


        ];
    }
    
}
