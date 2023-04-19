<?php

namespace App\Form;

use App\Entity\Chapitre;
use App\Entity\ChapStandard;
use App\Entity\SortieStandard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SortieStandardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('texteLien' , TextType::class, [
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__cards-label"],
                'label' => 'Texte du lien'
            ])
            ->add('chapitre', EntityType::class, [
                'class' => Chapitre::class,
                'choice_label' => 'idPlusTitle',
                "attr" => ["class" => "form-control"],
                "label_attr" => ["class" => "editor__cards-label"],
                'label' => 'Chapitre de destination'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SortieStandard::class,
        ]);
    }
}
