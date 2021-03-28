<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dossier
 *
 * @ORM\Table(name="dossier", indexes={@ORM\Index(name="Dossier_Utilisateur_FK", columns={"Id_Utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\DossierRepository")
 */
class Dossier
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Dossier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDossier;

    /**
     * @var string
     *
     * @ORM\Column(name="Fiche_de_validation", type="string", length=50, nullable=false)
     */
    private $ficheDeValidation;

    /**
     * @var string
     *
     * @ORM\Column(name="Convention_stage", type="string", length=50, nullable=false)
     */
    private $conventionStage;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdDossier(): ?int
    {
        return $this->idDossier;
    }

    public function getFicheDeValidation(): ?string
    {
        return $this->ficheDeValidation;
    }

    public function setFicheDeValidation(string $ficheDeValidation): self
    {
        $this->ficheDeValidation = $ficheDeValidation;

        return $this;
    }

    public function getConventionStage(): ?string
    {
        return $this->conventionStage;
    }

    public function setConventionStage(string $conventionStage): self
    {
        $this->conventionStage = $conventionStage;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
