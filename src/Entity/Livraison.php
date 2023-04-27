<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;





#[ORM\Entity(repositoryClass: LivraisonRepository::class)]

class Livraison
{
    #[ORM\Id] 
    #[ORM\GeneratedValue] 
    #[ORM\Column] 
    private ?int $idLivraison = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDemande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThanOrEqual("today")]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\Column(length: 256)] 
    private ?string $etatLivraison = null ;

    #[ORM\ManyToOne(targetEntity: Troc::class)]
    #[ORM\JoinColumn(name: 'id_troc', referencedColumnName: 'id_troc')]
    private ?Troc $idTroc = null;


    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_livreur', referencedColumnName: 'id')]
    private ?User $idLivreur = null;

    




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

    public function getIdTroc(): ?Troc
    {
        return $this->idTroc;
    }
    

    public function setIdTroc($idTroc): self
    {
        if ($idTroc instanceof Troc) {
            $this->idTroc = $idTroc;
        } elseif ($idTroc instanceof ArrayCollection) {
            $this->idTroc = $idTroc->toArray();
        } else {
            $this->idTroc = null;
        }
    
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

    public function addTroc(Troc $troc): self
    {
        if (!$this->idTroc->contains($troc)) {
            $this->idTroc[] = $troc;
            $troc->addLivraison($this);
        }

        return $this;
    }
}
