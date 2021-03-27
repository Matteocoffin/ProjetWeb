<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", indexes={@ORM\Index(name="Evaluation_Utilisateur_FK", columns={"Id_Utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\EvaluationRepository")
 */
class Evaluation
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Evaluation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvaluation;

    /**
     * @var int
     *
     * @ORM\Column(name="Notes_etoiles", type="integer", nullable=false)
     */
    private $notesEtoiles;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entreprise", inversedBy="idEvaluation")
     * @ORM\JoinTable(name="evaluationlier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_Evaluation", referencedColumnName="Id_Evaluation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_Entreprise", referencedColumnName="Id_Entreprise")
     *   }
     * )
     */
    private $idEntreprise;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEntreprise = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdEvaluation(): ?int
    {
        return $this->idEvaluation;
    }

    public function getNotesEtoiles(): ?int
    {
        return $this->notesEtoiles;
    }

    public function setNotesEtoiles(int $notesEtoiles): self
    {
        $this->notesEtoiles = $notesEtoiles;

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

    /**
     * @return Collection|Entreprise[]
     */
    public function getIdEntreprise(): Collection
    {
        return $this->idEntreprise;
    }

    public function addIdEntreprise(Entreprise $idEntreprise): self
    {
        if (!$this->idEntreprise->contains($idEntreprise)) {
            $this->idEntreprise[] = $idEntreprise;
        }

        return $this;
    }

    public function removeIdEntreprise(Entreprise $idEntreprise): self
    {
        $this->idEntreprise->removeElement($idEntreprise);

        return $this;
    }

}
