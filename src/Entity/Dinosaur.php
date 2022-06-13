<?php

namespace App\Entity;

use App\Repository\DinosaurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DinosaurRepository::class)]
class Dinosaur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $common_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $scientific_name;

    #[ORM\Column(type: 'integer')]
    private $length;

    #[ORM\Column(type: 'integer')]
    private $height;

    #[ORM\Column(type: 'integer')]
    private $weight;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $img_height;

    #[ORM\Column(type: 'string', length: 255)]
    private $period;

    #[ORM\Column(type: 'string', length: 255)]
    private $regime;

    #[ORM\Column(type: 'string', length: 255)]
    private $localisation;

    #[ORM\Column(type: 'string', length: 255)]
    private $fossil;

    #[ORM\OneToMany(mappedBy: 'dinosaur', targetEntity: Image::class, cascade:['persist'], orphanRemoval:true)]
    private $images;

    #[ORM\OneToMany(mappedBy: 'dinosaur', targetEntity: MoreInformation::class)]
    private $moreInformation;

    #[ORM\ManyToMany(targetEntity: Media::class, mappedBy: 'dinosaurs', cascade:['persist'])]
    private $media;

    #[ORM\ManyToOne(targetEntity: Classification::class, inversedBy: 'dinosaurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $classification;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->moreInformation = new ArrayCollection();
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->common_name;
    }

    public function setCommonName(string $common_name): self
    {
        $this->common_name = $common_name;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientific_name;
    }

    public function setScientificName(string $scientific_name): self
    {
        $this->scientific_name = $scientific_name;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

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

    public function getImgHeight(): ?string
    {
        return $this->img_height;
    }

    public function setImgHeight(string $img_height): self
    {
        $this->img_height = $img_height;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getRegime(): ?string
    {
        return $this->regime;
    }

    public function setRegime(string $regime): self
    {
        $this->regime = $regime;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getFossil(): ?string
    {
        return $this->fossil;
    }

    public function setFossil(string $fossil): self
    {
        $this->fossil = $fossil;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setDinosaur($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getDinosaur() === $this) {
                $image->setDinosaur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MoreInformation>
     */
    public function getMoreInformation(): Collection
    {
        return $this->moreInformation;
    }

    public function addMoreInformation(MoreInformation $moreInformation): self
    {
        if (!$this->moreInformation->contains($moreInformation)) {
            $this->moreInformation[] = $moreInformation;
            $moreInformation->setDinosaur($this);
        }

        return $this;
    }

    public function removeMoreInformation(MoreInformation $moreInformation): self
    {
        if ($this->moreInformation->removeElement($moreInformation)) {
            // set the owning side to null (unless already changed)
            if ($moreInformation->getDinosaur() === $this) {
                $moreInformation->setDinosaur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        $this->media->removeElement($medium);

        return $this;
    }

    public function getClassification(): ?Classification
    {
        return $this->classification;
    }

    public function setClassification(?Classification $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function __toString(): string
    {
        return $this->common_name;
    }
}
