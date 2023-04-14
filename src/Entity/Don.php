<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Don
 *
 * @ORM\Table(name="don", indexes={@ORM\Index(name="id_association", columns={"id_association"})})
 * @ORM\Entity
 */
class Don
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_don", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDon;

    /**
     * @var string
     * @Assert\Length(min=3,max=20,minMessage="Au moins 3 caractères",maxMessage="Au max 20 caractères")
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="produit", type="string", length=250, nullable=false)
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="description", type="text", length=250, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     * @Assert\LessThanOrEqual(value="today",message="Doit être inférieure à aujourdhui")
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var int
     * @Assert\Positive(message="Jeton est positif")
     * @ORM\Column(name="jeton", type="integer", nullable=false)
     */
    private $jeton;

    /**
     * @var string
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom;

    /**
     * @var \Association
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\ManyToOne(targetEntity="Association")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_association", referencedColumnName="id")
     * })
     */
    private $idAssociation;

    public function getIdDon(): ?int
    {
        return $this->idDon;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getJeton(): ?int
    {
        return $this->jeton;
    }

    public function setJeton(int $jeton): self
    {
        $this->jeton = $jeton;

        return $this;
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

    public function getIdAssociation(): ?Association
    {
        return $this->idAssociation;
    }

    public function setIdAssociation(?Association $idAssociation): self
    {
        $this->idAssociation = $idAssociation;

        return $this;
    }


}
