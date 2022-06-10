<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
            TextareaField::new('description','Description'),
            TextField::new('language', 'Langue'),
            TextField::new('place', 'Lieu'),
            IntegerField::new('average_duration', 'Duration'),
            IntegerField::new('tarif', 'Tarif'),
            




        ];
    }
    
}
