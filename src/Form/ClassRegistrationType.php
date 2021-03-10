<?php

namespace App\Form;

use App\Entity\Child;
use App\Form\DataTransformer\NameToCourseTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassRegistrationType extends AbstractType
{
    private $transformer;

    public function __construct(NameToCourseTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('numeroParent')
            ->add('email')
            ->add('niveau')
            ->add('cours')
            ->add('cours_valide', ChoiceType::class, [
                'choices' => [
                    'Mardi 19h' => '1',
                    'Mercredi 14h' => '2'
                ]
            ]);

        $builder->get('cours_valide')->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
