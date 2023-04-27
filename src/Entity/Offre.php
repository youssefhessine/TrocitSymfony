<?php

namespace App\Entity;
use App\Repository\OffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="nom_categorie", columns={"nom_categorie"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Offre
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="image_filename", type="string", length=255, nullable=false)
     */
    private $imageFilename;

    /*
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     *
    private $idUser;
*/
    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nom_categorie", referencedColumnName="nom")
     * })
     */
    private $nomCategorie;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    #[ORM\PrePersist]
    public function setDate(): void
    {
        $this->date = new \DateTimeImmutable();
    }
    #[ORM\PrePersist]
public function setCreatedAtValue(): void
{
    $this->date = new \DateTime();
}
    public function getNomCategorie(): ?Categorie
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(?categorie $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }
    public function getCategorieName(): ?string
{
    return $this->getCategorie() ? $this->getCategorie()->getNom() : null;
}
/*public function getIdUser(): ?int
{
    return $this->idUser;
}

public function setIdUser(int $id_user): self
{
    $this->id_user = $id_user;

    return $this;
}*/
#[Vich\UploadableField(mapping: 'offre_images', fileNameProperty: 'imageFilename')]
private ?File $imageFile = null;
public function setImageFile(?File $imageFile = null): void
{
    $this->imageFile = $imageFile;

    if (null !== $imageFile) {
        $this->updatedAt = new \DateTimeImmutable();
    }
}

public function getImageFile(): ?File
{
    return $this->imageFile;
}

public function setImageFilename(?string $imageFilename): void
{
    $this->imageFilename = $imageFilename;
}

public function getImageFilename(): ?string
{
    return $this->imageFilename;
}

public function uploadImage(): void
{
    if (null === $this->getImageFile()) {
        return;
    }

    $newFilename = uniqid().'.'.$this->getImageFile()->guessExtension();

    try {
        $this->getImageFile()->move(
            $this->getUploadsRootDir(),
            $newFilename
        );
    } catch (FileException $e) {
        // TODO: handle exception
    }

    $this->setImageFilename($newFilename);
    $this->setImageFile(null);
}

public function getUploadsRootDir(): string
{
    return __DIR__.'/../../public/uploads/offres';
}

}
