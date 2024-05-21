<?php

namespace App\Form;

use App\Entity\Route;
use App\Entity\Travel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravelStartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('placeStart', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96'
                ],
                'placeholder' => "Lieu de départ",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('placeEnd', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96'
                ],
                'placeholder' => "Lieu de d'arrivée",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e]'
                ],
                'placeholder' => "Date de départ",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e]'
                ],
                'placeholder' => "Date de d'arrivée'",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('timeStart', TimeType::class, [
                'input' => 'timestamp',
                'placeholder' => "Horaire de départ",
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('timeEnd', TimeType::class, [
                'input' => 'timestamp',
                'placeholder' => "Horaire de d'arrivée'",
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('nbVehicule', TextType::class,  [
                'attr' => [
                    'class' => 'input rounded-full p-1 mx-5 text-[#312c2e] w-96'
                ],
                'placeholder' => "N° vol/train/ferry/...",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            // ->add('travel', EntityType::class, [
            //     'class' => Travel::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Route::class,
        ]);
    }
}
