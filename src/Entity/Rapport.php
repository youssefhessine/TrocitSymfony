<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Rapport
 *
 * @ORM\Table(name="rapport", indexes={@ORM\Index(name="id_expertise", columns={"id_expertise"})})
 * @ORM\Entity
 */
class Rapport
{
    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reference;

    /**
     * @var string
     * @Assert\NotNull(message="Ce champ est obligatoire")
     * @ORM\Column(name="titre_rapport", type="string", length=254, nullable=false)
     */
    private $titreRapport;

    /**
     * @var string
     *
     * @ORM\Column(name="description_produit", type="string", length=254, nullable=false)
     */
    private $descriptionProduit;

    /**
     * @var \DateTime
     * @Assert\NotNull (message="Ce champ est obligatoire")
     * @ORM\Column(name="date_rapport", type="date", nullable=false)
     */
    private $dateRapport;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=254, nullable=false)
     */
    private $image;

    /**
     * @var \Expertise
     *
     * @ORM\ManyToOne(targetEntity="Expertise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_expertise", referencedColumnName="id_expertise")
     * })
     */
    private $id_expertise;

      /**
     * @var string
     *
     * @ORM\Column(name="etat_rapport", type="string", length=254, nullable=false)
     */
    private $etatRapport;


    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function getTitreRapport(): ?string
    {
        return $this->titreRapport;
    }

    public function setTitreRapport(string $titreRapport): self
    {
        $this->titreRapport = $titreRapport;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->descriptionProduit;
    }

    public function setDescriptionProduit(string $descriptionProduit): self
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    public function getDateRapport(): ?\DateTimeInterface
    {
        return $this->dateRapport;
    }

    public function setDateRapport(\DateTimeInterface $dateRapport): self
    {
        $this->dateRapport = $dateRapport;

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

  

public function getEtatRapport(): ?string
{
    return $this->etatRapport;
}

public function setEtatRapport(?string $etatRapport): self
{
    $this->etatRapport = $etatRapport;

    return $this;
}

    public function getIdExpertise(): ?Expertise
    {
        return $this->id_expertise;
    }

    public function setIdExpertise(?Expertise $id_expertise): self
    {
        $this->id_expertise = $id_expertise;

        return $this;
    }

    public function getEtatapport(): ?string
    {
        return $this->etatapport;
    }

    public function setEtatapport(string $etatapport): self
    {
        $this->etatapport = $etatapport;

        return $this;
    }


}
