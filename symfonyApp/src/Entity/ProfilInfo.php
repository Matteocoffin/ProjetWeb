<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilInfo
 *
 * @ORM\Table(name="profil_info", indexes={@ORM\Index(name="Profil_info_Utilisateur_FK", columns={"Id_Utilisateur"})})
 * @ORM\Entity
 */
class ProfilInfo
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Profil_info", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProfilInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="CV", type="string", length=50, nullable=false)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="Lettre_de_motivation", type="string", length=50, nullable=false)
     */
    private $lettreDeMotivation;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdProfilInfo(): ?int
    {
        return $this->idProfilInfo;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getLettreDeMotivation(): ?string
    {
        return $this->lettreDeMotivation;
    }

    public function setLettreDeMotivation(string $lettreDeMotivation): self
    {
        $this->lettreDeMotivation = $lettreDeMotivation;

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
