<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository")
 * @ApiResource
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("offre:read")
     */
    private $idOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createat", type="date", nullable=false)
     * @Groups("offre:read")
     */
    private $createat;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text", length=65535, nullable=false)
     * @Groups("offre:read")
     */
    private $titre;

    public function __construct()
    {
        $this->createat = new \DateTime();
    }

    public function getIdOffre(): ?int
    {
        return $this->idOffre;
    }

    public function getCreateat(): ?\DateTimeInterface
    {
        return $this->createat;
    }

    public function setCreateat(\DateTimeInterface $createat): self
    {
        $this->createat = $createat;

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


}
