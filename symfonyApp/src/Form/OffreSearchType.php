<?php

namespace App\Form;

use App\Entity\Localite;
use App\Entity\Search\OffreSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OffreSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('maxRemuneration', IntegerType::class,[
            //    'required' => false,
            //    'label' => false,
            //    'attr' => [
            //        'placeholder' => 'Remuneration maximal'
            //    ]
            //])
            ->add('s', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]

            ])
            //->add('Searchlocalite', EntityType::class,[
            //    'label' => false,
            //    'required' => false,
            //    'class' => Localite::class,
            //    'expanded' => false,
            //    'multiple' =>true
            //])

            ->add('Searchlocalite', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])

            ->add('SearchCompetences', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])

            ->add('SearchEntreprise', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])

            ->add('min', NumberType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'min'
                ]
            ])
            ->add('max', NumberType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'max'
                ]
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OffreSearch::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
