<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;




#[ORM\Entity(repositoryClass: LivraisonRepository::class)]

class Livraison
{
    #[ORM\Id] 
    #[ORM\GeneratedValue] 
    #[ORM\Column] 
    private ?int $idLivraison = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThanOrEqual("today")]
    private ?\DateTimeInterface $dateDemande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\Column(length: 256)] 
    private ?string $etatLivraison = null ;

    #[ORM\ManyToMany(targetEntity: Troc::class, mappedBy: 'livraisons')]
    private Collection $idTroc;


    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_livreur', referencedColumnName: 'id')]
    private ?User $idLivreur = null;

    

    public function __construct()
    {
        $this->idTroc = new ArrayCollection();
    }


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
        if ($this->idTroc->isEmpty()) {
            return null;
        }
    
        return $this->idTroc->first();
    }
    

    public function setIdTroc($idTroc): self
    {
        if ($idTroc instanceof Troc) {
            $this->idTroc = new ArrayCollection([$idTroc]);
        } else {
            $this->idTroc = $idTroc;
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
