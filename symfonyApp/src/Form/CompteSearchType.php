<?php

namespace App\Form;

use App\Entity\Promo;
use App\Entity\Search\CompteSearch;
use App\Entity\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
    

class CompteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('s', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]

            ])

            ->add('idSearch', NumberType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'id'
                ]
            ])
            ->add('SearchType', EntityType::class,[
                    'label' => false,
                    'required' => false,
                    'class' => Type::class,
                    'expanded' => false,
                    'multiple' =>true
            ])
            ->add('SearchPromo', EntityType::class,[
                    'label' => false,
                    'required' => false,
                    'class' => Promo::class,
                    'expanded' => false,
                    'multiple' =>true
            ])
            ->add('SearchCentre', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompteSearch::class,
        ]);
    }
}
