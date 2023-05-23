<?php

namespace App\Form;

use App\Form\NotesType;
use App\Entity\Notes;
use App\Entity\NoteDeFond;
use App\Entity\NoteDeTete;
use App\Entity\NoteDeCoeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NotesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder       
            ->add('note',TextType::class,[
            'label' => 'note'])
            ->add('noteDeTete')
            ->add('noteDeCoeur')
            ->add('noteDeFond')
            ->add('submit',SubmitType::class,[
                'label'=>'submit'])
                ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,

            // 'data_class' => Notes::class,
        ]);
    }
}
