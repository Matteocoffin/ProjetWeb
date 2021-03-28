<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avancement
 *
 * @ORM\Table(name="avancement")
 * @ORM\Entity(repositoryClass="App\Repository\AvancementRepository")
 */
class Avancement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Avancement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAvancement;

    /**
     * @var string
     *
     * @ORM\Column(name="Etape", type="string", length=50, nullable=false)
     */
    private $etape;

    public function __toString()
    {
        return $this->etape;
    }

    public function getIdAvancement(): ?int
    {
        return $this->idAvancement;
    }

    public function getEtape(): ?string
    {
        return $this->etape;
    }

    public function setEtape(string $etape): self
    {
        $this->etape = $etape;

        return $this;
    }


}
