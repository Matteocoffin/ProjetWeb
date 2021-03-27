<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Evaluation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType as TypeEntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;



class EvaluerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder    
            ->add('notesEtoiles',ChoiceType::class, [
                'choices'  => [
                    '1 étoile' => 1,
                    '2 étoiles' => 2,
                    '3 étoiles' => 3,
                    '4 étoiles' => 4,
                    '5 étoiles' => 5,
                ],
            ])
            //->add('idUtilisateur')
            ->add('idEntreprise', TypeEntityType::class,[
                    'label' => false,
                    'required' => false,
                    'class' => Entreprise::class,
                    'expanded' => false,
                    'multiple' =>true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluation::class,
        ]);
    }
}
