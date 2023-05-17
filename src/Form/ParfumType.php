<?php

namespace App\Form;

use App\Entity\Parfum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParfumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('avis')
            ->add('note')
            ->add('image')
            ->add('contenance')
            ->add('description')
            ->add('marque')
            ->add('utilisateurs')
            ->add('utilisateur')
            ->add('dupe')
            ->add('parfums')
            ->add('noteTete')
            ->add('noteCoeur')
            ->add('noteFond')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parfum::class,
        ]);
    }
}
