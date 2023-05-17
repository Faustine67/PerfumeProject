<?php

namespace App\Form;

use App\Entity\Marque;
use App\Model\SearchData;
use App\Entity\NoteDeTete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' =>'Rechercher']
            ])

            // ->add('marque', EntityType::class, [
            //     'label' => false,
            //     'required' => false,
            //     'class' => Marque::class,
            //     'expanded' => true,
            //     'multiple' => true,
            //     'choice_label' => 'nom', // ou un autre champ à afficher pour les options
            // ])

            ->add('noteTete', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => NoteDeTete::class,
                'expanded' => true,
                'multiple' => true,
                'choice_label' => 'nom', // ou un autre champ à afficher pour les options

            ])
            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Prix Minimum']
            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Prix Maximum']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
