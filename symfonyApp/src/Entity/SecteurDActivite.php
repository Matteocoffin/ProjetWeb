<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SecteurDActivite
 *
 * @ORM\Table(name="secteur_d_activite")
 * @ORM\Entity(repositoryClass="App\Repository\SecteurRepository")
 */
class SecteurDActivite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_secteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSecteur;

    /**
     * @var string
     *
     * @ORM\Column(name="Secteur_d_activite", type="string", length=50, nullable=false)
     */
    private $secteurDActivite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entreprise", inversedBy="idSecteur")
     * @ORM\JoinTable(name="secteurlier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_secteur", referencedColumnName="id_secteur")
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

    public function __toString()
    {
        return $this->secteurDActivite;
    }

    public function getIdSecteur(): ?int
    {
        return $this->idSecteur;
    }

    public function getSecteurDActivite(): ?string
    {
        return $this->secteurDActivite;
    }

    public function setSecteurDActivite(string $secteurDActivite): self
    {
        $this->secteurDActivite = $secteurDActivite;

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
