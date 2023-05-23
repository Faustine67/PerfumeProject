<?php

namespace App\Form;

use App\Entity\Parfum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ParfumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'nom'])
            ->add('prix',IntegerType::class,[
                'label'=>'prix'])
            ->add('avis',TextareaType::class,[
                'label'=>'avis'])
            // ->add('note',IntegerType::class,[
            //     'label'=>'note'])
            ->add('image',FileType::class,[
                'label'=>'image'])
            ->add('contenance',IntegerType::class,[
                'label'=>'contenance'])
            // ->add('description',TextareaType::class,[
            //     'label'=>'descritption'])
            ->add('marque')
            // ->add('users')
            // ->add('user')
            //->add('dupe')
            //->add('parfums')
            ->add('noteTete')
            ->add('noteCoeur')
            ->add('noteFond')
            ->add('submit',SubmitType::class,[
                'label'=>'submit'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parfum::class,
        ]);
    }
}
