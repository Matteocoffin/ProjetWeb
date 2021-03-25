<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centre
 *
 * @ORM\Table(name="centre")
 * @ORM\Entity(repositoryClass="App\Repository\CentreRepository")
 */
class Centre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Centre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCentre;

    /**
     * @var string
     *
     * @ORM\Column(name="Centre", type="string", length=50, nullable=false)
     */
    private $centre;

    public function __toString()
    {
        return $this->centre;
    }

    public function getIdCentre(): ?int
    {
        return $this->idCentre;
    }

    public function getCentre(): ?string
    {
        return $this->centre;
    }

    public function setCentre(string $centre): self
    {
        $this->centre = $centre;

        return $this;
    }


}
