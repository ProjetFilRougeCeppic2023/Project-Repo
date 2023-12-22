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
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('icon')
            ->add('description')
            ->add('themes')
            ->add('tags',EntityType::class, [
                'class' => 'App\Entity\Tag',
                'choice_label' => 'name', // Le champ de l'entité Tag à afficher dans le formulaire
                'multiple' => true, // Autoriser la sélection multiple
                'expanded' => true, // Afficher sous forme de cases à cocher
                'by_reference' => false, // Pour éviter l'erreur "Expected an array" avec l'option "multiple"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }

}
