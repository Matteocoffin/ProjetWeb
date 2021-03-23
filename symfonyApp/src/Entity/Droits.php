<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Droits
 *
 * @ORM\Table(name="droits")
 * @ORM\Entity(repositoryClass="App\Repository\DroitsRepository")
 */
class Droits
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_droits", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDroits;

    /**
     * @var string
     *
     * @ORM\Column(name="Droit", type="string", length=50, nullable=false)
     */
    private $droit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="idDroits")
     * @ORM\JoinTable(name="droitlier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_droits", referencedColumnName="id_droits")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     *   }
     * )
     */
    private $idUtilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdDroits(): ?int
    {
        return $this->idDroits;
    }

    public function getDroit(): ?string
    {
        return $this->droit;
    }

    public function setDroit(string $droit): self
    {
        $this->droit = $droit;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->idUtilisateur;
    }

    public function addIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        if (!$this->idUtilisateur->contains($idUtilisateur)) {
            $this->idUtilisateur[] = $idUtilisateur;
        }

        return $this;
    }

    public function removeIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur->removeElement($idUtilisateur);

        return $this;
    }

}
