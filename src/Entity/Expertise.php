<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expertise
 *
 * @ORM\Table(name="expertise", indexes={@ORM\Index(name="id_offre", columns={"id_offre"})})
 * @ORM\Entity
 */
class Expertise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_expertise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExpertise;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=256, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=256, nullable=false)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id")
     * })
     */
    private $idOffre;


}
