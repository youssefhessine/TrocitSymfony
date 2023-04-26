<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,[
                'label'=>'Titre :  ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le titre ne doit pas être vide.'
                    ]),
                    new Length(['min' => 3 ,
                    'minMessage' => 'Le longueure de titre doit étre au moins de 3 caractères '
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-zA-Z])[a-zA-Z0-9\s]*$/',
                        'message' => 'Le titre doit contenir des lettres , les nombres ne sont pas autorisés seuls.'
                    ])
                  
                    ]
            ])

            ->add('type', ChoiceType::class, [
                'label'=>'Type : ',
                'choices' => [
                    'Bien' => 'Bien',
                    'Service' => 'Service'
                ],
                'expanded' => true, 
                'multiple' => false, 
                'label_attr' => ['class' => 'radio-label'] 
            ])
            ->add('description', TextareaType::class, [
                'label'=>'Description : ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description ne doit pas être vide.'
                    ])
                    ]
                    ])
            ->add('nomCategorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'label'=>'Categorie : ',
                'placeholder' => 'Chosir une categorie',
            ])
           ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Image (PNG, JPG) : ',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir une image. ',
                    ]),
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir une image PNG ou JPEG valide',
                    ])
                ]
            ]);
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
