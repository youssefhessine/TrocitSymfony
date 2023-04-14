<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Club_name',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Manager_name',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Capacity',NumberType::class,['attr' => ['class' => 'form-control']])
            ->add('Location',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Id_communaute')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
