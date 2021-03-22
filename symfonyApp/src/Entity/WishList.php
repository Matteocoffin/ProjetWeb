<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WishList
 *
 * @ORM\Table(name="wish_list", indexes={@ORM\Index(name="Wish_list_Utilisateur_FK", columns={"Id_Utilisateur"}), @ORM\Index(name="Wish_list_Offre0_FK", columns={"Id_Offre"})})
 * @ORM\Entity
 */
class WishList
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Wishlist", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idWishlist;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Offre", referencedColumnName="Id_Offre")
     * })
     */
    private $idOffre;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Utilisateur", referencedColumnName="Id_Utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdWishlist(): ?int
    {
        return $this->idWishlist;
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
