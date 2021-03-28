<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Entreprise;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="Offre_Utilisateur_FK", columns={"Id_Utilisateur"}), @ORM\Index(name="Offre_Entreprise0_FK", columns={"Id_Entreprise"})})
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_stage", type="date", nullable=false)
     */
    private $debutStage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_stage", type="date", nullable=false)
     */
    private $finStage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_offre", type="date", nullable=false)
     */
    private $dateOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="Remuneration", type="decimal", precision=15, scale=3, nullable=false)
     */
    private $remuneration;

    /**
     * @var int
     *
     * @ORM\Column(name="Nb_place", type="integer", nullable=false)
     */
    private $nbPlace;

    /**
     * @var string
     * @Assert\Length(min=5,max=255)
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     * @Assert\Length(min=5,max=255)
     * @ORM\Column(name="Titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Entreprise", referencedColumnName="Id_Entreprise")
     * })
     */
    private $idEntreprise;

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
     * @ORM\ManyToMany(targetEntity="Competences",mappedBy="idOffre")   
     */
    private $idCompetences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCompetences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateOffre = new \DateTime();
    }

    public function __toString()
    {
        return $this->titre;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->description);
    }


    public function getIdOffre(): ?int
    {
        return $this->idOffre;
    }

    public function getDebutStage(): ?\DateTimeInterface
    {
        return $this->debutStage;
    }

    public function setDebutStage(\DateTimeInterface $debutStage): self
    {
        $this->debutStage = $debutStage;

        return $this;
    }

    public function getFinStage(): ?\DateTimeInterface
    {
        return $this->finStage;
    }

    public function setFinStage(\DateTimeInterface $finStage): self
    {
        $this->finStage = $finStage;

        return $this;
    }

    public function getDateOffre(): ?\DateTimeInterface
    {
        return $this->dateOffre;
    }

    public function setDateOffre(\DateTimeInterface $dateOffre): self
    {
        $this->dateOffre = $dateOffre;

        return $this;
    }

    public function getRemuneration(): ?string
    {
        return $this->remuneration;
    }

    public function setRemuneration(string $remuneration): self
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIdEntreprise(): ?Entreprise
    {
        return $this->idEntreprise;
    }

    public function setIdEntreprise(?Entreprise $idEntreprise): self
    {
        $this->idEntreprise = $idEntreprise;

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
     * @return Collection|Competences[]
     */
    public function getIdCompetences(): Collection
    {
        return $this->idCompetences;
    }

    public function addIdCompetence(Competences $idCompetence): self
    {
        if (!$this->idCompetences->contains($idCompetence)) {
            $this->idCompetences[] = $idCompetence;
            $idCompetence->addIdOffre($this);
        }

        return $this;
    }

    public function removeIdCompetence(Competences $idCompetence): self
    {
        if ($this->idCompetences->removeElement($idCompetence)) {
            $idCompetence->removeIdOffre($this);
        }

        return $this;
    }

}
