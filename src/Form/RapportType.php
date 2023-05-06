<?php

namespace App\Form;

use App\Entity\Rapport;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreRapport',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('descriptionProduit',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('dateRapport',DateType::class,['attr' => ['class' => 'form-control']])
            ->add('image',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('id_expertise')
            ->add('etat_rapport', ChoiceType::class, [
                'choices' => [
                    'verifié' => 'verifié',
                    'non verifié' => 'non verifié',
                ],
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rapport::class,
        ]);
    }
}
