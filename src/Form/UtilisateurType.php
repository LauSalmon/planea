<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 text-[#312c2e] w-96'
                ],
                'label' => "Saisir votre nom :",
                'label_attr' => ["class" => 'label_input'],
                //si on veux que la valeur ne sois obligatoire
                'required' => true
            ])
            ->add('firstName', TextType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 text-[#312c2e] w-96'
                ],
                'label' => "Saisir votre prénom :",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'input rounded-full p-1 text-[#312c2e] w-96'
                ],
                'label' => "Saisir votre email :",
                'label_attr' => ["class" => 'label_input'],
                'required' => true
            ])
            ->add('pwd', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les 2 mots de passe ne correspondent pas.',
                'options' => ['attr' => ['class' => 'password-field rounded-full p-1 w-96 flex text-[#312c2e]']],
                'label' => ' ',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmez le mot de passe'],
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
