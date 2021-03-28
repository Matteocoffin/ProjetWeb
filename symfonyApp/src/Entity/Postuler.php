<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postuler
 *
 * @ORM\Table(name="postuler", indexes={@ORM\Index(name="postuler_Offre0_FK", columns={"Id_Offre"}), @ORM\Index(name="postuler_Avancement1_FK", columns={"Id_Avancement"}), @ORM\Index(name="IDX_8EC5A68D4EF6594B", columns={"Id_Utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\PostulerRepository")
 */
class Postuler
{
    /**
     * @var \Avancement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Avancement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Avancement", referencedColumnName="Id_Avancement")
     * })
     */
    private $idAvancement;

    /**
     * @var \Offre
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Offre", referencedColumnName="Id_Offre")
     * })
     */
    private $idOffre;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdAvancement(): ?Avancement
    {
        return $this->idAvancement;
    }

    public function setIdAvancement(?Avancement $idAvancement): self
    {
        $this->idAvancement = $idAvancement;

        return $this;
    }

    public function getIdOffre(): ?Offre
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Offre $idOffre): self
    {
        $this->idOffre = $idOffre;

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
