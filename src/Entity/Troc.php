<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Troc
 *
 * @ORM\Table(name="troc", indexes={@ORM\Index(name="produit1ref", columns={"produit1ref", "produit2ref"}), @ORM\Index(name="offre_troc1", columns={"produit2ref"}), @ORM\Index(name="produit1ref_2", columns={"produit1ref", "produit2ref"}), @ORM\Index(name="IDX_A4B213638E22C9EA", columns={"produit1ref"})})
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


}
