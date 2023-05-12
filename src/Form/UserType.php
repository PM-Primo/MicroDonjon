<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', RepeatedType::class, [
            'type' => EmailType::class,
            'invalid_message' => 'Les adresses mail doivent être identiques',
            'required' => true,
            'first_options' => [
                'label' => 'Nouvelle adresse mail',
                'label_attr' => ["class" => "editor__label"],
                'attr' => ["class" => "form-control"]
            ],
            'second_options' => [
                'label' => 'Confirmer l\'adresse mail',
                'label_attr' => ["class" => "editor__label"],
                'attr' => ["class" => "form-control"]
            ],
        ])
        ->add('pseudo', TextType::class, [
            "attr" => ["class" => "form-control"],
            "label_attr" => ["class" => "editor__label"],
            'label' => 'Nouveau Pseudo'
        ])
        ->add('submit', SubmitType::class, ["attr" => ["class" => "editor__submit editor__btn"], 'label' => 'Valider'])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
