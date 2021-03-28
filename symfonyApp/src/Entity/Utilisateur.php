<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="Utilisateur_Promo1_FK", columns={"Id_Promo"}), @ORM\Index(name="Utilisateur_Type_FK", columns={"Id_Type"}), @ORM\Index(name="Utilisateur_Centre0_FK", columns={"Id_Centre"})})
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity("email","login")
 */
class Utilisateur implements UserInterface,\Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var \Centre
     *
     * @ORM\ManyToOne(targetEntity="Centre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Centre", referencedColumnName="Id_Centre")
     * })
     */
    private $idCentre;

    /**
     * @var \Promo
     *
     * @ORM\ManyToOne(targetEntity="Promo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Promo", referencedColumnName="Id_Promo")
     * })
     */
    private $idPromo;

    /**
     * @var \Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Type", referencedColumnName="Id_Type")
     * })
     */
    private $idType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Droits", mappedBy="idUtilisateur")
     */
    private $idDroits;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idDroits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdCentre(): ?Centre
    {
        return $this->idCentre;
    }

    public function setIdCentre(?Centre $idCentre): self
    {
        $this->idCentre = $idCentre;

        return $this;
    }

    public function getIdPromo(): ?Promo
    {
        return $this->idPromo;
    }

    public function setIdPromo(?Promo $idPromo): self
    {
        $this->idPromo = $idPromo;

        return $this;
    }

    public function getIdType(): ?Type
    {
        return $this->idType;
    }

    public function setIdType(?Type $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return Collection|Droits[]
     */
    public function getIdDroits(): Collection
    {
        return $this->idDroits;
    }

    public function addIdDroit(Droits $idDroit): self
    {
        if (!$this->idDroits->contains($idDroit)) {
            $this->idDroits[] = $idDroit;
            $idDroit->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeIdDroit(Droits $idDroit): self
    {
        if ($this->idDroits->removeElement($idDroit)) {
            $idDroit->removeIdUtilisateur($this);
        }

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return string[] The user roles
     */
    public function getRoles()
    {
        if($this->idType == 'Administrateur'){
            return ['ROLE_ADMIN'];
        }
        else if($this->idType == 'Etudiant'){
            return ['ROLE_USER'];
        }
        else if($this->idType == 'Pilote'){
            return ['ROLE_PILOTE','ROLE_ADMIN'];
        }

    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string|null The encoded password if any
     */
    public function getPassword()
    {
        return $this->mdp;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->login;
    } 
    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {} 

    public function serialize()
    {
        return serialize([
            $this->idUtilisateur,
            $this->login,
            $this->mdp
        ]);
    }

    public function unserialize($serialized)
    {
        list (
            $this->idUtilisateur,
            $this->login,
            $this->mdp
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

}
