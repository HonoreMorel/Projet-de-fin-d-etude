<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Media::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('type', 'type')->setChoices([
                'Podcast'=>'Podcast',
                'Vidéo'=>'Vidéo',
                
            ]),
            TextareaField::new('code'),
            AssociationField::new('dinosaurs'),
            BooleanField::new('suggestion'),
            
           
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-photo-film')->setLabel('Créer un Média');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Créer un Média')
            ->setPageTitle('index', 'Créer un Média');
    }
/* 
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    } */
}
