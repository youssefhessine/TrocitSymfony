<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 254)]
    private ?string $Club_name = null;

    #[ORM\Column(length: 254)]
    private ?string $Manager_name = null;

    #[ORM\Column]
    private ?int $Capacity = null;

    #[ORM\Column(length: 254)]
    private ?string $Location = null;

    #[ORM\Column]
    private ?int $Id_communaute = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->Club_name;
    }

    public function setClubName(string $Club_name): self
    {
        $this->Club_name = $Club_name;

        return $this;
    }

    public function getManagerName(): ?string
    {
        return $this->Manager_name;
    }

    public function setManagerName(string $Manager_name): self
    {
        $this->Manager_name = $Manager_name;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->Capacity;
    }

    public function setCapacity(int $Capacity): self
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getIdCommunaute(): ?int
    {
        return $this->Id_communaute;
    }

    public function setIdCommunaute(int $Id_communaute): self
    {
        $this->Id_communaute = $Id_communaute;

        return $this;
    }
}
