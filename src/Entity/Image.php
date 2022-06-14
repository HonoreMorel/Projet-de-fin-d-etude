<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $url;

    #[ORM\Column(type: 'string', length: 255)]
    private $alt;

    #[ORM\Column(type: 'boolean')]
    private $main_image;

    #[ORM\ManyToOne(targetEntity: Dinosaur::class, inversedBy: 'images', cascade:['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private $dinosaur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function isMainImage(): ?bool
    {
        return $this->main_image;
    }

    public function setMainImage(bool $main_image): self
    {
        $this->main_image = $main_image;

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

    public function __toString(): string
    {
        return $this->url;
    }
}
