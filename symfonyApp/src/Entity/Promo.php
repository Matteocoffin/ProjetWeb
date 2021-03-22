<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promo")
 * @ORM\Entity
 */
class Promo
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Promo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPromo;

    /**
     * @var string
     *
     * @ORM\Column(name="Promotion_ecole", type="string", length=50, nullable=false)
     */
    private $promotionEcole;

    public function getIdPromo(): ?int
    {
        return $this->idPromo;
    }

    public function getPromotionEcole(): ?string
    {
        return $this->promotionEcole;
    }

    public function setPromotionEcole(string $promotionEcole): self
    {
        $this->promotionEcole = $promotionEcole;

        return $this;
    }


}
