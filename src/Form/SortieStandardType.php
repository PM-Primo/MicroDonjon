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
            ->add('texteLien' , TextType::class, ["attr" => ["class" => "form-control"]])
            ->add('chapitre', EntityType::class, ['class' => Chapitre::class, 'choice_label' => 'id',"attr" => ["class" => "form-control"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SortieStandard::class,
        ]);
    }
}
