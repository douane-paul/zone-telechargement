<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: films::class, inversedBy: 'genres')]
    private $films;

    #[ORM\ManyToMany(targetEntity: Series::class, inversedBy: 'genres')]
    private $series;

    #[ORM\ManyToMany(targetEntity: Documentaires::class, mappedBy: 'genres')]
    private $documentaires;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->series = new ArrayCollection();
        $this->documentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, films>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(films $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films[] = $film;
        }

        return $this;
    }

    public function removeFilm(films $film): self
    {
        $this->films->removeElement($film);

        return $this;
    }

    /**
     * @return Collection<int, Series>
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        $this->series->removeElement($series);

        return $this;
    }

    /**
     * @return Collection<int, Documentaires>
     */
    public function getDocumentaires(): Collection
    {
        return $this->documentaires;
    }

    public function addDocumentaire(Documentaires $documentaire): self
    {
        if (!$this->documentaires->contains($documentaire)) {
            $this->documentaires[] = $documentaire;
            $documentaire->addGenre($this);
        }

        return $this;
    }

    public function removeDocumentaire(Documentaires $documentaire): self
    {
        if ($this->documentaires->removeElement($documentaire)) {
            $documentaire->removeGenre($this);
        }

        return $this;
    }
}
