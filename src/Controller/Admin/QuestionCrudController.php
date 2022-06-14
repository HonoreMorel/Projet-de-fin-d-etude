<?php

namespace App\Controller\Admin;

use App\Entity\Question;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\Admin\AnswerCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Question::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('statement','Question'),
            ImageField::new('image')->setUploadDir('public/img/')->setBasePath('/img/'),
            CollectionField::new('answers', 'Réponses')->useEntryCrudForm(AnswerCrudController::class),
        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa-solid fa-circle-question')->setLabel('Créer une Question');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Créer une Question')
            ->setPageTitle('index', 'Créer une Question');
    }

   /*  public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        dd($instance);
        $entityManager->persist($entityInstance);
        
        $entityManager->flush();
    } */
}
