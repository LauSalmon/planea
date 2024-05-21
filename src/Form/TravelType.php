<?php

namespace App\Form;

use App\Entity\Travel;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TravelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96'
                ],
                'label' => "Saisir un nom pour votre voyage :",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('nbPassenger', NumberType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e]'
                ],
                'label' => "Saisir le nombre de passager :",
                'label_attr' => ["class" => 'label_input'],
                'html5' => true,
                'required' => true
            ])
            ->add('country', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96'
                ],
                'label' => "Saisir le ou les pays visité(s) :",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e]'
                ],
                'label' => 'Saisir la date de départ :',
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e]'
                ],
                'label' => 'Saisir la date de retour :',
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'expanded' => false,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Travel::class,
        ]);
    }
}
