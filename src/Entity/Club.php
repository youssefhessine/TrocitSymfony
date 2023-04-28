<?php

namespace App\Entity;
use Doctrine\DBAL\Types\type;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Communaute;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="fk6", columns={"id_communaute_id"})})
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *@Groups({"groups", "Club"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     
    * @Assert\NotBlank(message=" nomPub  est obligatoire")
     * @Assert\Type(type="string")
     * @var string
     *@Groups({"groups", "Club"})
     * @ORM\Column(name="nom_pub", type="string", length=255, nullable=false)
     */
    private $nomPub;

    /**
    * @Assert\NotBlank(message=" description est obligatoire")
     * @Assert\Length(
     *      min = 8,
     *      minMessage=" Entrer un Description au mini de 8 caracteres")
     *@Groups("Clubs")
     *     
     * @var string
     *@Groups({"groups", "Club"})
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @Assert\NotBlank(message=" image  est obligatoire")
     * @Assert\Type(type="string")
     * @var string
     *@Groups({"groups", "Club"})
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * 
     */
    private $image;

    /**
     * @var \Communaute
     *
     * @ORM\ManyToOne(targetEntity=Communaute::class)
     * @ORM\JoinColumn(nullable=false)
     * })
     * 
     */

    private $idCommunaute;


         /**
     * @var int
     *
     *@Groups({"groups", "Club"})
     */
    private $ide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIde(): ?int
    {
        return $this->getIdCommunaute->getId();
    }


    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNomPub(): ?string
    {
        return $this->nomPub;
    }

    public function nom_pub(): ?string
    {
        return $this->nomPub;
    }


    public function setNomPub(string $nomPub): self
    {
        $this->nomPub = $nomPub;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdCommunaute(): ?Communaute
    {
        return $this->idCommunaute;
    }

    public function setIdCommunaute(?Communaute $idCommunaute): self
    {
        $this->idCommunaute = $idCommunaute;

        return $this;
    }


}
