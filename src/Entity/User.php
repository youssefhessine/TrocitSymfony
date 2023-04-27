<?php

namespace App\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]

#[UniqueEntity(fields : "email",message :"L'email que vous avez indiqué est déja utilisé !")]

class User {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length:256)]
    private ?string $prenom = null ;



    #[ORM\Column(length:256)]
    private ?string $nom = null ;

    
    
    #[ORM\Column]
    private ?int $numero=null;


    #[ORM\Column(length:256)]
    #[Assert\Email(message : "The email '{{ value }}' is not a valid email.",  )]
    private ?string $email  = null ;

    

    #[ORM\Column(length:256)]
    private ?string $adresse  = null ;

    #[ORM\Column(length:25)]
    private ?string $password  = null ;


    #[ORM\Column(length:256)]
    private ?string $genre  = null ;


    #[ORM\Column(length:256)]
    private ?string $role  = null ;


    #[ORM\ManyToOne(inversedBy:'user')]
    #[ORM\JoinColumn(name: 'id_wallet', referencedColumnName: 'id_wallet')]
    private ?Wallet $idWallet =null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getIdWallet(): ?Wallet
    {
        return $this->idWallet;
    }

    public function setIdWallet(?Wallet $idWallet): self
    {
        $this->idWallet = $idWallet;

        return $this;
    }

    

}
