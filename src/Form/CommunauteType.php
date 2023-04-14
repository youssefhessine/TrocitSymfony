<?php

namespace App\Form;

use App\Entity\Communaute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommunauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Description',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Type',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Location',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('Date',DateType::class,['attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Communaute::class,
        ]);
    }
}
