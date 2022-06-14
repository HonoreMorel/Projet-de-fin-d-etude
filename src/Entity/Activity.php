<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $tarif;

    #[ORM\Column(type: 'string', length: 255)]
    private $average_duration;

    #[ORM\Column(type: 'string', length: 255)]
    private $place;

    #[ORM\Column(type: 'string', length: 255)]
    private $language;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\ManyToMany(targetEntity: Filter::class, inversedBy: 'activities')]
    private $filter;

    public function __construct()
    {
        $this->filter = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?int
    {
        return $this->tarif;
    }

    public function setTarif(int $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getAverageDuration(): ?string
    {
        return $this->average_duration;
    }

    public function setAverageDuration(string $average_duration): self
    {
        $this->average_duration = $average_duration;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

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

    /**
     * @return Collection<int, Filter>
     */
    public function getFilter(): Collection
    {
        return $this->filter;
    }

    public function addFilter(Filter $filter): self
    {
        if (!$this->filter->contains($filter)) {
            $this->filter[] = $filter;
        }

        return $this;
    }

    public function removeFilter(Filter $filter): self
    {
        $this->filter->removeElement($filter);

        return $this;
    }
}
