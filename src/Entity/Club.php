<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="Id_communaute", columns={"Id_communaute"})})
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Club_name", type="string", length=250, nullable=false)
     */
    private $clubName;

    /**
     * @var string
     *
     * @ORM\Column(name="Manager_name", type="string", length=250, nullable=false)
     */
    private $managerName;

    /**
     * @var int
     *
     * @ORM\Column(name="Capacity", type="integer", nullable=false)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=250, nullable=false)
     */
    private $location;

    /**
     * @var \Communauté
     *
     * @ORM\ManyToOne(targetEntity="Communauté")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_communaute", referencedColumnName="Id")
     * })
     */
    private $idCommunaute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->clubName;
    }

    public function setClubName(string $clubName): self
    {
        $this->clubName = $clubName;

        return $this;
    }

    public function getManagerName(): ?string
    {
        return $this->managerName;
    }

    public function setManagerName(string $managerName): self
    {
        $this->managerName = $managerName;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getIdCommunaute(): ?Communauté
    {
        return $this->idCommunaute;
    }

    public function setIdCommunaute(?Communauté $idCommunaute): self
    {
        $this->idCommunaute = $idCommunaute;

        return $this;
    }


}
