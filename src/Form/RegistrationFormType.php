<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__label"],
                'label' => 'Adresse e-mail'
            ])
            ->add('pseudo', TextType::class, [
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__label"],
                'label' => 'Pseudo'
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accepter les termes & conditions',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez accepter les termes et conditions afin de poursuivre',
                    ]),
                ],
                'attr' => ["class" => "form-control"],
                'label_attr' => ["class" => "editor__label"],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'label_attr' => ["class" => "editor__label"],
                    'attr' => ["class" => "form-control"]
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'label_attr' => ["class" => "editor__label"],
                    'attr' => ["class" => "form-control"]
                ],

                'attr' => ['autocomplete' => 'new-password'],
                'row_attr' => ['class' => 'text-editor', 'id' => '...'],

                "label_attr" => ["class" => "editor__label"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],

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
