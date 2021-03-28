<?php

namespace App\Form;

use App\Entity\Avancement;
use App\Entity\Promo;
use App\Entity\Search\EtudiantSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtudiantSearchType extends AbstractType
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
            ->add('SearchPromo', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Promo::class,
                'expanded' => true,
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
            'data_class' => EtudiantSearch::class,
        ]);
    }
}
