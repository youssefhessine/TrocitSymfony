<?php

namespace App\Entity;

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


}
