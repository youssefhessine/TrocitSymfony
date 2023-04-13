<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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
     *
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
     *
     * @ORM\Column(name="date_rapport", type="date", nullable=false)
     */
    private $dateRapport;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_rapport", type="string", length=256, nullable=false)
     */
    private $etatRapport;

    /**
     * @var \Expertise
     *
     * @ORM\ManyToOne(targetEntity="Expertise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_expertise", referencedColumnName="id_expertise")
     * })
     */
    private $idExpertise;

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

    public function getEtatRapport(): ?string
    {
        return $this->etatRapport;
    }

    public function setEtatRapport(string $etatRapport): self
    {
        $this->etatRapport = $etatRapport;

        return $this;
    }

    public function getIdExpertise(): ?Expertise
    {
        return $this->idExpertise;
    }

    public function setIdExpertise(?Expertise $idExpertise): self
    {
        $this->idExpertise = $idExpertise;

        return $this;
    }


}
