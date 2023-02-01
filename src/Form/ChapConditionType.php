<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\Zone;
use App\Entity\ChapCondition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ChapConditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreChapitre' , TextType::class, ["attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('texteSiVrai' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5']])
            ->add('texteSiFaux' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5']])
            ->add('zone' , EntityType::class, ['class' => Zone::class, 'choice_label' => 'nomZone', "attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('itemCondition' , EntityType::class, ['class' => Item::class, 'choice_label' => 'nomItem', "attr" => ["class" => "form-control"]])

            ->add('submit', SubmitType::class, ["attr" => ["class" => "button-valider"]])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChapCondition::class,
        ]);
    }
}
