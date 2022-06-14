<?php

namespace App\Entity;

use App\Repository\MoreInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoreInformationRepository::class)]
class MoreInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable:true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $alt;

    #[ORM\ManyToOne(targetEntity: Dinosaur::class, inversedBy: 'moreInformation')]
    #[ORM\JoinColumn(nullable: false)]
    private $dinosaur;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getDinosaur(): ?Dinosaur
    {
        return $this->dinosaur;
    }

    public function setDinosaur(?Dinosaur $dinosaur): self
    {
        $this->dinosaur = $dinosaur;

        return $this;
    }
}
