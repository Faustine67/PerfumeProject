<?php

namespace App\Form;

use App\Entity\NoteDeFond;
use App\Entity\NoteDeTete;
use App\Entity\NoteDeCoeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class NotesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
         
                $builder       
                ->add('note', TextType::class, [
                    'label' => 'Note',
                ])
                ->add('noteDeTete', CheckboxType::class, [
                    'label' => 'Note De Tete',
                    'required' => false,
                ])
                ->add('noteDeCoeur', CheckboxType::class, [
                    'label' => 'Note De Coeur',
                    'required' => false,
                ])
                ->add('noteDeFond', CheckboxType::class, [
                    'label' => 'Note De Fond',
                    'required' => false,
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Submit'
                ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,

        ]);
    }
}
