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
            ->add('titreChapitre' , TextType::class, ["attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"], 'mapped' => false, 'label' => 'Titre du chapitre'])
            ->add('texteChapitre' , TextareaType::class, ["attr" => ["class" => "form-control", 'rows' => '5'],"label_attr" => ["class" => "editor__label"], 'label' => 'Texte du chapitre'])
            ->add('zone' , EntityType::class, ['class' => Zone::class, 'choice_label' => 'nomZone', "attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"], 'mapped' => false, 'label' => 'Zone'])
            ->add('modifGold', IntegerType::class, ["attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"],'required'=> false, 'label' => 'Modificateur de pièces d\'or'])
            ->add('modifPV', IntegerType::class, ["attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"],'required'=> false, 'label' => 'Modificateur de points de vie'])
            ->add('modifAttaque', IntegerType::class, ["attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"],'required'=> false, 'label' => 'Modificateur de points d\'attaque'])
            ->add('itemPrendre', EntityType::class, ['class' => Item::class, 'choice_label' => 'nomItem',"attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"],'required'=> false, 'label' => 'Objet à récupérer'])
            ->add('itemPerdre', EntityType::class, ['class' => Item::class, 'choice_label' => 'nomItem',"attr" => ["class" => "form-control"], "label_attr" => ["class" => "editor__label"],'required'=> false, 'label' => 'Objet à céder'])

            ->add('sorties', CollectionType::class, [
                'entry_type' => SortieStandardType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                // 'label' => 'Liste des sorties',
                // "label_attr" => ["class" => "editor__label"]
            ])

            ->add('submit', SubmitType::class, ["attr" => ["class" => "editor__submit-btn"], 'label' => 'Valider !'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChapStandard::class,
        ]);
    }
}
