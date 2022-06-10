<?php

namespace App\Controller\Admin;

use App\Entity\Dinosaur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
            
            TextField::new('common_name'),
            TextEditorField::new('scientific_name'),
            IntegerField::new('length'),
            IntegerField::new('height'),
            IntegerField::new('weight'),
            IntegerField::new('length'),
            TextareaField::new('description'),
            CollectionField::new('images'),
            TextField::new('period'),
            TextField::new('regime'),
            TextField::new('localisation'),
            TextField::new('fossil'),


        ];
    }
    
}
