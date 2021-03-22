<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity
 */
class Localite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_localite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLocalite;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=50, nullable=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=50, nullable=false)
     */
    private $codePostal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entreprise", inversedBy="idLocalite")
     * @ORM\JoinTable(name="localitelier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_localite", referencedColumnName="id_localite")
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

    public function getIdLocalite(): ?int
    {
        return $this->idLocalite;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

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
