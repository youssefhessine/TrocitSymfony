<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="id_troc", columns={"id_troc"}), @ORM\Index(name="id_livreur", columns={"id_livreur"})})
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livreur", referencedColumnName="id")
     * })
     */
    private $idLivreur;

    /**
     * @var \Troc
     *
     * @ORM\ManyToOne(targetEntity="Troc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_troc", referencedColumnName="id_troc")
     * })
     */
    private $idTroc;

    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getEtatLivraison(): ?string
    {
        return $this->etatLivraison;
    }

    public function setEtatLivraison(string $etatLivraison): self
    {
        $this->etatLivraison = $etatLivraison;

        return $this;
    }

    public function getIdLivreur(): ?User
    {
        return $this->idLivreur;
    }

    public function setIdLivreur(?User $idLivreur): self
    {
        $this->idLivreur = $idLivreur;

        return $this;
    }

    public function getIdTroc(): ?Troc
    {
        return $this->idTroc;
    }

    public function setIdTroc(?Troc $idTroc): self
    {
        $this->idTroc = $idTroc;

        return $this;
    }


}
