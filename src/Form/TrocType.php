<?php

namespace App\Form;

use App\Entity\Troc;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrocType extends AbstractType

{

    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom1')
            ->add('nom2')
            ->add('produit1ref')
            ->add('produit2ref')
            ->add('numtel1', TelType::class, [
                'attr' => ['pattern' => '[0-9]{8}'],
                'label_attr' => ['pattern' => '[0-9]{8}'],
                'help' => 'Le numéro de téléphone doit être composé de 8 chiffres.'
            ])           
             ->add('numtel2')
            ->add('shippingAdress1')
            ->add('shippingAdress2')
            ->add('description')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Troc::class,
        ]);
    }
}
