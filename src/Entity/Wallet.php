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


}
