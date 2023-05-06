<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Expertise
 *
 * @ORM\Table(name="expertise", indexes={@ORM\Index(name="id_offre", columns={"id_offre"}), @ORM\Index(name="id_offre_2", columns={"id_offre"})})
 * @ORM\Entity
 */
class Expertise
{
    public function __toString(): string
    {
        return $this->titre;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id_expertise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_expertise;

    /**
 * @var string
 * @Assert\Regex(
 *     pattern="/^[^0-9]*$/",
 *     message="La chaîne ne doit pas contenir de chiffres"
 * )
 * @ORM\Column(name="description", type="string", length=256, nullable=false)
 */
private $description;

    /**
     * @var string
     * @Assert\Length(max=250,maxMessage="Maximum 200 caractères.")
     * @ORM\Column(name="titre", type="string", length=256, nullable=false)
     */
    private $titre;

    /**
 * @var \DateTime
 * @Assert\GreaterThanOrEqual(value="today", message="La date ne doit pas être antérieure à aujourd'hui")
 * @ORM\Column(name="date", type="date", nullable=false)
 */
    private $date;

  

    /**
     * @var \Offre
     * @Assert\NotNull(message="Champ obligatoire")
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id")
     * })
     */
    private $idOffre;

    public function getId_expertise(): ?int
    {
        return $this->id_expertise;
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getIdOffre(): ?Offre
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Offre $idOffre): self
    {
        $this->idOffre = $idOffre;

        return $this;
    }


}