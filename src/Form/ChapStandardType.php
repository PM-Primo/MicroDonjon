<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\Zone;
use App\Entity\ChapStandard;
use App\Form\SortieStandardType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ChapStandardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreChapitre' , TextType::class, ["attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('texteChapitre' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5']])
            ->add('zone' , EntityType::class, ['class' => Zone::class, 'choice_label' => 'nomZone', "attr" => ["class" => "form-control"], 'mapped' => false])
            ->add('modifGold', IntegerType::class, ["attr" => ["class" => "form-control"],'required'=> false])
            ->add('modifPV', IntegerType::class, ["attr" => ["class" => "form-control"],'required'=> false])
            ->add('modifAttaque', IntegerType::class, ["attr" => ["class" => "form-control"],'required'=> false])
            ->add('itemPrendre', EntityType::class, ['class' => Item::class, 'choice_label' => 'nomItem',"attr" => ["class" => "form-control"],'required'=> false])
            ->add('itemPerdre', EntityType::class, ['class' => Item::class, 'choice_label' => 'nomItem',"attr" => ["class" => "form-control"],'required'=> false])

            ->add('sorties', CollectionType::class, [
                'entry_type' => SortieStandardType::class,
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
            'data_class' => ChapStandard::class,
        ]);
    }
}
