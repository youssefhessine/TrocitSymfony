<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Validator\Constraints\Length;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('Prenom')
            ->add('Nom')
            ->add('Numero', TelType::class, [
                'attr' => ['pattern' => '[0-9]{8}'],
                'label_attr' => ['pattern' => '[0-9]{8}'],
                'help' => 'Le numéro de téléphone doit être composé de 8 chiffres.'
            ])

            ->add('Email',TelType::class, [
               
                'help' => 'Email deja utilisé.'
            ])

            


            ->add('Adresse')
            ->add('Password', PasswordType::class)
            ->add('Genre', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme'
                ],
                'expanded' => true, // Use radio buttons instead of a dropdown
                'multiple' => false, // Only allow one selection
                'label_attr' => ['class' => 'radio-label'] // Add a class to the radio button labels
            ])
            ->add('Role', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'Admin',
                    'livreur' => 'Livreur',
                    'Troqeur'=> 'Troqeur'
                ],
                'expanded' => true, // Use radio buttons instead of a dropdown
                'multiple' => false, // Only allow one selection
                'label_attr' => ['class' => 'radio-label'] // Add a class to the radio button labels
            ])
            ;
            
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
