<?php

namespace App\Form;

use App\Entity\Movie;
use App\Repository\TagRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('icon')
            ->add('description')
            ->add('themes')
            ->add('tags', EntityType::class, [
                'class' => 'App\Entity\Tag',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'attr' => [
                    'class' => 'btn btn-light selectpicker', // Ajoutez les classes de Bootstrap SelectPicker
                    'data-live-search' => 'true', // Active la recherche en direct
                    'role' => 'combobox',
                    'aria-owns' => 'bs-select-3',
                    'aria-haspopup' => 'listbox',
                    'aria-expanded' => 'false',
                    'title' => 'Select Tags', // Remplacez par le titre souhaité
                    // Vous pouvez également ajouter d'autres attributs de données Bootstrap ici
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }

}
