<?php

namespace App\Form;

use App\Entity\Host;
use App\Entity\Travel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96',
                    'placeholder' => "Nom de l'hébergement*",
                ],
                
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('address', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96',
                    'placeholder' => "Adresse de l'hébergement*",
                ],
                
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('phone', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96',
                    'placeholder' => "Numéro de téléphone",
                ],
                
                'label_attr' => ["class" => 'label_input'],
                'required' => false
            ])
            ->add('price', MoneyType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-48',
                    'placeholder' => "Prix/pers. €",
                ],
                
                'required'   => false,
            ])
            ->add('info', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96',
                    'placeholder' => "Information complémentaire",
                ],
                
                'label_attr' => ["class" => 'label_input'],
                'required' => false
            ])
            ->add('radio', ChoiceType::class, [
                'choices'  => [
                    'Payé' => true,
                    'A payer' => false,
                ],
                'attr' => [
                    'class' => 'input rounded-full p-2 mx-5 text-[#fffefd] bg-[#6E7554] border-[#fffefd] border-2',
                ],
                'required' => true
            ])
            // ->add('travel', EntityType::class, [
            //     'class' => Travel::class,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Host::class,
        ]);
    }
}
