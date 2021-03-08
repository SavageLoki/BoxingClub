<?php

namespace App\Form;

use App\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('numeroParent')
            ->add('email')
            ->add('niveau', ChoiceType::class, [
                'choices' => [
                    'Débutant' => 'beginner',
                    'Moyen' => 'middle',
                    'Confirmé' => 'highLevel'

                ]
            ])
            ->add('cours', ChoiceType::class, [
                'choices' => [
                    'Mardi 19h' => 'class1',
                    'Mercredi 14h' => 'class2'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
