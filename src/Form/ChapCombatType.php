<?php

namespace App\Form;

use App\Entity\Zone;
use App\Entity\Monstre;
use App\Entity\ChapCombat;
use App\Form\SortieCombatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ChapCombatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreChapitre' , TextType::class, ["attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('texteInitial' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5']])
            ->add('texteVictoire' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5']])
            ->add('zone' , EntityType::class, ['class' => Zone::class, 'choice_label' => 'nomZone', "attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('monstre' , EntityType::class, ['class' => Monstre::class, 'choice_label' => 'nomMonstre', "attr" => ["class" => "form-control"]])

            ->add('sorties', CollectionType::class, [
                'entry_type' => SortieCombatType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])

            ->add('submit', SubmitType::class, ["attr" => ["class" => "button-valider"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChapCombat::class,
        ]);
    }
}
