<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="id_livreur", columns={"id_livreur"}), @ORM\Index(name="id_troc", columns={"id_troc"})})
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_livraison", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivraison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="date", nullable=false)
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_livraison", type="date", nullable=false)
     */
    private $dateLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_livraison", type="string", length=255, nullable=false)
     */
    private $etatLivraison;

    /**
     * @var \Troc
     *
     * @ORM\ManyToOne(targetEntity="Troc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_troc", referencedColumnName="id_troc")
     * })
     */
    private $idTroc;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livreur", referencedColumnName="id")
     * })
     */
    private $idLivreur;


}
