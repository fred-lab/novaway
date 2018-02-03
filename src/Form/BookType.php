<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isnb', Texttype::class, [
                'label' => 'N° ISNB'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('author', TextType::class, [
                'label' => 'Auteur'
            ])
            ->add('releaseDate', DateType::class)
            ->add('pages', IntegerType::class, [
                'label' => 'Page'
            ])
            ->add('resume', TextareaType::class, [
                'label' => 'Résumé du livre'
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Prix'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
