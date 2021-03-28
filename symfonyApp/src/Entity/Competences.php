<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competences
 *
 * @ORM\Table(name="competences")
 * @ORM\Entity(repositoryClass="App\Repository\CompetencesRepository")
 */
class Competences
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Competences", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompetences;

    /**
     * @var string
     *
     * @ORM\Column(name="Competences", type="string", length=50, nullable=false)
     */
    private $competences;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offre", inversedBy="idCompetences")
     * @ORM\JoinTable(name="competencelier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_Competences", referencedColumnName="Id_Competences")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_Offre", referencedColumnName="Id_Offre")
     *   }
     * )
     */
    private $idOffre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idOffre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->competences;
    }

    public function getIdCompetences(): ?int
    {
        return $this->idCompetences;
    }

    public function getCompetences(): ?string
    {
        return $this->competences;
    }

    public function setCompetences(string $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getIdOffre(): Collection
    {
        return $this->idOffre;
    }

    public function addIdOffre(Offre $idOffre): self
    {
        if (!$this->idOffre->contains($idOffre)) {
            $this->idOffre[] = $idOffre;
        }

        return $this;
    }

    public function removeIdOffre(Offre $idOffre): self
    {
        $this->idOffre->removeElement($idOffre);

        return $this;
    }

}
