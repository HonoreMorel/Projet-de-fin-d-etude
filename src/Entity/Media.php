<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $type;

    #[ORM\Column(type: 'text')]
    private $code;

    #[ORM\Column(type: 'boolean')]
    private $suggestion;

    #[ORM\ManyToMany(targetEntity: Dinosaur::class, inversedBy: 'media',cascade:['persist'])]
    private $dinosaurs;

    public function __construct()
    {
        $this->dinosaurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function isSuggestion(): ?bool
    {
        return $this->suggestion;
    }

    public function setSuggestion(bool $suggestion): self
    {
        $this->suggestion = $suggestion;

        return $this;
    }

    /**
     * @return Collection<int, Dinosaur>
     */
    public function getDinosaurs(): Collection
    {
        return $this->dinosaurs;
    }

    public function addDinosaur(Dinosaur $dinosaur): self
    {
        if (!$this->dinosaurs->contains($dinosaur)) {
            $this->dinosaurs[] = $dinosaur;
            $dinosaur->addMedium($this);
        }

        return $this;
    }

    public function removeDinosaur(Dinosaur $dinosaur): self
    {
        if ($this->dinosaurs->removeElement($dinosaur)) {
            $dinosaur->removeMedium($this);
        }

        return $this;
    }
}
