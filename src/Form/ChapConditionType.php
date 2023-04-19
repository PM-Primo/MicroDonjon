<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\Zone;
use App\Entity\ChapCondition;
use App\Form\SortieConditionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ChapConditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreChapitre' , TextType::class, [
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__label"],
                'mapped' => false,
                'label' => 'Titre du chapitre'
            ])
            ->add('texteSiVrai' , TextareaType::class, [
                "attr" => ["class" => "form-control", 'rows' => '5'],
                "label_attr" => ["class" => "editor__label"],
                'label' => 'Texte (condition vérifiée)'
            ])
            ->add('texteSiFaux' , TextareaType::class, [
                "attr" => ["class" => "form-control", 'rows' => '5'],
                "label_attr" => ["class" => "editor__label"],
                'label' => 'Texte (condition non vérifiée)'
            ])
            ->add('zone' , EntityType::class, [
                'class' => Zone::class,
                'choice_label' => 'nomZone',
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__label"],
                'mapped' => false,
                'label' => 'Zone'
            ])
            ->add('itemCondition' , EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'nomItem',
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__label"],
                'label' => 'Objet de la condition'

            ])

            ->add('sorties', CollectionType::class, [
                'entry_type' => SortieConditionType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])

            ->add('submit', SubmitType::class, [
                "attr" => ["class" => "editor__submit editor__btn"],
                'label' => 'Valider !'    
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChapCondition::class,
        ]);
    }
}
