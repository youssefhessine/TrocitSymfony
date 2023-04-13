<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cagnotte
 *
 * @ORM\Table(name="cagnotte")
 * @ORM\Entity
 */
class Cagnotte
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="somme", type="integer", nullable=false)
     */
    private $somme;


}
