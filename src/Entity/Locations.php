<?php

namespace App\Entity;

use App\Repository\LocationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationsRepository::class)]
class Locations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $cord_x = null;

    #[ORM\Column]
    private ?float $cord_y = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCordX(): ?float
    {
        return $this->cord_x;
    }

    public function setCordX(float $cord_x): self
    {
        $this->cord_x = $cord_x;

        return $this;
    }

    public function getCordY(): ?float
    {
        return $this->cord_y;
    }

    public function setCordY(float $cord_y): self
    {
        $this->cord_y = $cord_y;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }
}
