<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'DVD' => 'DVD',
                    'Bluray' => 'Bluray'
                ]
            ])
            ->add('isan', TextType::class, [
                'label' => 'N° ISAN'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('director', TextType::class, [
                'label' => 'Réalisateur'
            ])
            ->add('actors', TextType::class, [
                'label' => 'Liste des acteurs (séparé par \';\')'
            ])
            ->add('resume', TextareaType::class, [
                'label' => 'Résumé du film'
            ])
            ->add('releaseDate', DateType::class)
            ->add('duration', IntegerType::class, [
                'label' => 'Durée du film en minute'
            ])
            ->add('price', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
