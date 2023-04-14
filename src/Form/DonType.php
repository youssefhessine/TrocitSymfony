<?php

namespace App\Form;

use App\Entity\Don;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('produit',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('image',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('description',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('date',DateType::class,['attr' => ['class' => 'form-control']])
            ->add('jeton',NumberType::class,['attr' => ['class' => 'form-control']])
            ->add('nom',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('idAssociation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Don::class,
        ]);
    }
}
