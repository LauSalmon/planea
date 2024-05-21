<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConnectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 text-[#312c2e] w-96'
                ],
                'label' => "Saisir votre mail :",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('pwd', PasswordType::class, [
                'attr' => ['class' => 'password-field rounded-full p-1 flex text-[#312c2e] w-96'],
                'label' => 'Saisir vote mot de passe :',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
