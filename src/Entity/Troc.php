<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Troc
 *
 * @ORM\Table(name="troc", indexes={@ORM\Index(name="offre_troc1", columns={"produit2ref"}), @ORM\Index(name="produit1ref_2", columns={"produit1ref", "produit2ref"}), @ORM\Index(name="produit1ref", columns={"produit1ref", "produit2ref"}), @ORM\Index(name="IDX_A4B213638E22C9EA", columns={"produit1ref"})})
 * @ORM\Entity
 */
class Troc
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_troc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTroc;

    /**
     * @var string
     *
     * @ORM\Column(name="nom1", type="string", length=256, nullable=false)
     */
    private $nom1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom2", type="string", length=256, nullable=false)
     */
    private $nom2;

    /**
     * @var int
     *
     * @ORM\Column(name="numtel1", type="integer", nullable=false)
     */
    private $numtel1;

    /**
     * @var int
     *
     * @ORM\Column(name="numtel2", type="integer", nullable=false)
     */
    private $numtel2;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_adress1", type="string", length=256, nullable=false)
     */
    private $shippingAdress1;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_adress2", type="string", length=256, nullable=false)
     */
    private $shippingAdress2;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=256, nullable=false)
     */
    private $description;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit1ref", referencedColumnName="id")
     * })
     */
    private $produit1ref;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit2ref", referencedColumnName="id")
     * })
     */
    private $produit2ref;

    public function getIdTroc(): ?int
    {
        return $this->idTroc;
    }

    public function getNom1(): ?string
    {
        return $this->nom1;
    }

    public function setNom1(string $nom1): self
    {
        $this->nom1 = $nom1;

        return $this;
    }

    public function getNom2(): ?string
    {
        return $this->nom2;
    }

    public function setNom2(string $nom2): self
    {
        $this->nom2 = $nom2;

        return $this;
    }

    public function getNumtel1(): ?int
    {
        return $this->numtel1;
    }

    public function setNumtel1(int $numtel1): self
    {
        $this->numtel1 = $numtel1;

        return $this;
    }

    public function getNumtel2(): ?int
    {
        return $this->numtel2;
    }

    public function setNumtel2(int $numtel2): self
    {
        $this->numtel2 = $numtel2;

        return $this;
    }

    public function getShippingAdress1(): ?string
    {
        return $this->shippingAdress1;
    }

    public function setShippingAdress1(string $shippingAdress1): self
    {
        $this->shippingAdress1 = $shippingAdress1;

        return $this;
    }

    public function getShippingAdress2(): ?string
    {
        return $this->shippingAdress2;
    }

    public function setShippingAdress2(string $shippingAdress2): self
    {
        $this->shippingAdress2 = $shippingAdress2;

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

    public function getProduit1ref(): ?Offre
    {
        return $this->produit1ref;
    }

    public function setProduit1ref(?Offre $produit1ref): self
    {
        $this->produit1ref = $produit1ref;

        return $this;
    }

    public function getProduit2ref(): ?Offre
    {
        return $this->produit2ref;
    }

    public function setProduit2ref(?Offre $produit2ref): self
    {
        $this->produit2ref = $produit2ref;

        return $this;
    }


}
