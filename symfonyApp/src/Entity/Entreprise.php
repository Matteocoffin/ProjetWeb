<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Entreprise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_entreprise", type="string", length=50, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_de_stagiaires_CESI", type="integer", nullable=false)
     */
    private $nbDeStagiairesCesi;

    /**
     * @var string
     *
     * @ORM\Column(name="info_email", type="string", length=50, nullable=false)
     */
    private $infoEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evaluation", mappedBy="idEntreprise")
     */
    private $idEvaluation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Localite", mappedBy="idEntreprise")
     */
    private $idLocalite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SecteurDActivite", mappedBy="idEntreprise")
     */
    private $idSecteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEvaluation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLocalite = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idSecteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdEntreprise(): ?int
    {
        return $this->idEntreprise;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }
    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->nomEntreprise);
    }

    public function getNbDeStagiairesCesi(): ?int
    {
        return $this->nbDeStagiairesCesi;
    }

    public function setNbDeStagiairesCesi(int $nbDeStagiairesCesi): self
    {
        $this->nbDeStagiairesCesi = $nbDeStagiairesCesi;

        return $this;
    }

    public function getInfoEmail(): ?string
    {
        return $this->infoEmail;
    }

    public function setInfoEmail(string $infoEmail): self
    {
        $this->infoEmail = $infoEmail;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getIdEvaluation(): Collection
    {
        return $this->idEvaluation;
    }

    public function addIdEvaluation(Evaluation $idEvaluation): self
    {
        if (!$this->idEvaluation->contains($idEvaluation)) {
            $this->idEvaluation[] = $idEvaluation;
            $idEvaluation->addIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdEvaluation(Evaluation $idEvaluation): self
    {
        if ($this->idEvaluation->removeElement($idEvaluation)) {
            $idEvaluation->removeIdEntreprise($this);
        }

        return $this;
    }

    /**
     * @return Collection|Localite[]
     */
    public function getIdLocalite(): Collection
    {
        return $this->idLocalite;
    }

    public function addIdLocalite(Localite $idLocalite): self
    {
        if (!$this->idLocalite->contains($idLocalite)) {
            $this->idLocalite[] = $idLocalite;
            $idLocalite->addIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdLocalite(Localite $idLocalite): self
    {
        if ($this->idLocalite->removeElement($idLocalite)) {
            $idLocalite->removeIdEntreprise($this);
        }

        return $this;
    }

    /**
     * @return Collection|SecteurDActivite[]
     */
    public function getIdSecteur(): Collection
    {
        return $this->idSecteur;
    }

    public function addIdSecteur(SecteurDActivite $idSecteur): self
    {
        if (!$this->idSecteur->contains($idSecteur)) {
            $this->idSecteur[] = $idSecteur;
            $idSecteur->addIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdSecteur(SecteurDActivite $idSecteur): self
    {
        if ($this->idSecteur->removeElement($idSecteur)) {
            $idSecteur->removeIdEntreprise($this);
        }

        return $this;
    }

}
