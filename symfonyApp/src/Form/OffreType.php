<?php

namespace App\Form;

use App\Entity\Offre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('debutStage')
            ->add('finStage')
            //->add('dateOffre')
            ->add('remuneration')
            ->add('nbPlace')
            ->add('description', TextareaType::class)
            ->add('idEntreprise')
            //->add('idUtilisateur')
            //->add('idCompetences')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
