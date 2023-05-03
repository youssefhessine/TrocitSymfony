<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WalletRepository;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_wallet")]
    private ?int $idWallet = null;

    #[ORM\Column]
    private ?int $nbJeton=null;


    #[ORM\Column]
    private ?int $nbTransaction=null;


    #[ORM\Column(length:256)]
    private ?string $dateTransaction  = null ;

    
    public function getIdWallet(): ?int
    {
        return $this->idWallet;
    }

    public function getNbJeton(): ?int
    {
        return $this->nbJeton;
    }

    public function setNbJeton(int $nbJeton): self
    {
        $this->nbJeton = $nbJeton;

        return $this;
    }

    public function getNbTransaction(): ?int
    {
        return $this->nbTransaction;
    }

    public function setNbTransaction(int $nbTransaction): self
    {
        $this->nbTransaction = $nbTransaction;

        return $this;
    }

    public function getDateTransaction(): ?string
    {
        return $this->dateTransaction;
    }

    public function setDateTransaction(string $dateTransaction): self
    {
        $this->dateTransaction = $dateTransaction;

        return $this;
    }


}