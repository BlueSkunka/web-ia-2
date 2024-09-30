<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
class Suite
{
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbChambre = null;

    #[ORM\Column]
    private ?int $surface = null;

    #[ORM\Column]
    private ?int $nbFenetre = null;

    #[ORM\Column]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbChambre(): ?int
    {
        return $this->nbChambre;
    }

    public function setNbChambre(int $nbChambre): static
    {
        $this->nbChambre = $nbChambre;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNbFenetre(): ?int
    {
        return $this->nbFenetre;
    }

    public function setNbFenetre(int $nbFenetre): static
    {
        $this->nbFenetre = $nbFenetre;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
