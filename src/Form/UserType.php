<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control form-control-lg mb-5 border-success'],
                'label_attr'=> ['class'=> 'form-label']
            ])
            
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => ' Les 2 mots de passe doivent être identiques',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe',
                'attr' => ['class' => 'form-control form-control-lg mb-5 border-success'],
                'label_attr'=> ['class'=> 'form-label']],
                'second_options' => ['label' => 'Répétez le mot de passe',
                'attr' => ['class' => 'form-control form-control-lg mb-5 border-success'],
                'label_attr'=> ['class'=> 'form-label']],
            ])

            ->add('nickname', TextType::class, [
                'attr' => ['class' => 'form-control form-control-lg mb-5 border-success'],
                'label_attr'=> ['class'=> 'form-label']
            ])

            ->add('photo',
            FileType::class, [
            'required' => false ,
            'attr' => ['class' => 'form-control form-control-lg mb-5 border-success'],
            'label_attr'=> ['class'=> 'form-label '], 'data_class' => null])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
