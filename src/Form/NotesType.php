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
        // $builder       
        //     ->add('note',TextType::class,[
        //     'label' => 'note'])
        //     ->add('noteDeTete', CheckboxType::class,[
        //         'label'=>'Note De Tete'])
        //     ->add('noteDeCoeur', CheckboxType::class,[
        //             'label'=>'Note De Coeur'])
        //     ->add('noteDeFond',CheckboxType::class,[
        //         'label'=>'Note De Fond'])
        //     ->add('submit',SubmitType::class,[
        //         'label'=>'submit'])
        //         ;

                // $builder       
                // ->add('note', TextType::class, [
                //     'label' => 'Note'
                // ])
                // ->add('noteDeTete', EntityType::class, [
                //     'class' => NoteDeTete::class,
                //     'label' => 'Note De Tete',
                //     // 'choice_label' => 'propertyName', // Remplacez "propertyName" par le nom de la propriété à afficher dans le formulaire
                // ])
                // ->add('noteDeCoeur', EntityType::class, [
                //     'class' => NoteDeCoeur::class,
                //     'label' => 'Note De Coeur',
                //     // 'choice_label' => 'propertyName', // Remplacez "propertyName" par le nom de la propriété à afficher dans le formulaire
                // ])
                // ->add('noteDeFond', EntityType::class, [
                //     'class' => NoteDeFond::class,
                //     'label' => 'Note De Fond',
                //     // 'choice_label' => 'propertyName', // Remplacez "propertyName" par le nom de la propriété à afficher dans le formulaire
                // ])
                // ->add('submit', SubmitType::class, [
                //     'label' => 'Submit'
                // ]);


                $builder       
                ->add('note', TextType::class, [
                    'label' => 'Note'
                ])
                ->add('noteDeTete', CheckboxType::class, [
                    'label' => 'Note De Tete',
                    'mapped' => false,
                    'required' => false,
                ])
                ->add('noteDeCoeur', CheckboxType::class, [
                    'label' => 'Note De Coeur',
                    'mapped' => false,
                    'required' => false,
                ])
                ->add('noteDeFond', CheckboxType::class, [
                    'label' => 'Note De Fond',
                    'mapped' => false,
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

            // 'data_class' => Notes::class,
        ]);
    }
}
