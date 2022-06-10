<?php

namespace App\Controller\Admin;

use App\Entity\Dinosaur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DinosaurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dinosaur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
