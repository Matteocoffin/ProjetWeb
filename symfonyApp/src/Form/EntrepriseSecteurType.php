<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\SecteurDActivite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\SecteurRepository;
use phpDocumentor\Reflection\Element;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseSecteurType extends AbstractType
{


    /**
     * @var SecteurRepository
     */
    private $repository;

    public function __construct(SecteurRepository $repository)
    {
        $this->repository = $repository;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEntreprise')
            ->add('idLocalite')
            ->add('idSecteur') 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }

    //private function getChoices(){
    //    $Secteur = new SecteurDActivite();
    //    $Secteur = $this->repository->FindAll();
    //    dump($Secteur);
    //    return ['Secteur' => $Secteur];
    //}
}
