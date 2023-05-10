<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email' , EmailType::class, [
            "attr" => ["class" => "form-control"],
            "label_attr" => ["class" => "editor__cards-label"],
            'label' => 'Nouvelle adresse mail'
        ])
        ->add('pseudo', TextType::class, [
            "attr" => ["class" => "form-control"],
            "label_attr" => ["class" => "editor__cards-label"],
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
