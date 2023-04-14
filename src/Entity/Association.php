<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Association
 *
 * @ORM\Table(name="association")
 * @ORM\Entity
 */
class Association
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="adresse", type="string", length=250, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="metier", type="string", length=250, nullable=false)
     */
    private $metier;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="responsable", type="string", length=250, nullable=false)
     */
    private $responsable;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
