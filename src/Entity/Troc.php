<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrocRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrocRepository::class)]

class Troc
{
    #[ORM\Id] 
    #[ORM\GeneratedValue] 
    #[ORM\Column] 
    private ?int $idTroc =null;

    #[ORM\Column(length:256)] 
    private ?string $nom1 = null ;

    #[ORM\Column(length:256)] 
    private ?string $nom2 = null ;

    #[ORM\Column] 
    #[Assert\Regex( pattern : "/^[0-9]{8}$/", message : "Le numéro de téléphone doit contenir exactement 8 chiffres")]
    private ?int $numtel1 =null;

    #[ORM\Column] 
    private ?int $numtel2 =null;

    #[ORM\Column(length:256)] 
    private ?string $shippingAdress1 = null ;

    #[ORM\Column(length:256)] 
    private ?string $shippingAdress2 = null ;

    #[ORM\Column(length:256)] 
    private ?string $description = null ;

    #[ORM\Column] 
    private ?int $produit1ref;

    #[ORM\Column] 
    private ?int $produit2ref;


    

    

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

    public function getProduit1ref(): ?int
    {
        return $this->produit1ref;
    }

    public function setProduit1ref(?int $produit1ref): self
    {
        $this->produit1ref = $produit1ref;

        return $this;
    }

    public function getProduit2ref(): ?int
    {
        return $this->produit2ref;
    }

    public function setProduit2ref(?int $produit2ref): self
    {
        $this->produit2ref = $produit2ref;

        return $this;
    }

    public function __toString()
    {
        return $this->idTroc; // retourne le id du troc en chaîne de caractères
    }


}
