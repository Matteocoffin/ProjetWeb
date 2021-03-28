<?php

namespace App\Form;

use App\Entity\Search\EntrepriseSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EntrepriseSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idSearch', NumberType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'id'
                ]
            ])
            ->add('s', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]

            ])
            ->add('SearchSecteur', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])

            ->add('Searchlocalite', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])

            ->add('nbCesi', NumberType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'nb de places'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EntrepriseSearch::class,
        ]);
    }
}
