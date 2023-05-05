<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wallet
 *
 * @ORM\Table(name="wallet")
 * @ORM\Entity
 */
class Wallet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_wallet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idWallet;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_jeton", type="integer", nullable=false)
     */
    private $nbJeton;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_transaction", type="integer", nullable=false)
     */
    private $nbTransaction;

    /**
     * @var string
     *
     * @ORM\Column(name="date_transaction", type="string", length=256, nullable=false)
     */
    private $dateTransaction;
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
