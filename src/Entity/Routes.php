<?php

namespace App\Entity;

use App\Repository\RouteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RouteRepository::class)]
class Routes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $placeStart = null;

    #[ORM\Column(length: 150)]
    private ?string $placeEnd = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $timeStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $timeEnd = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nbVehicule = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(length: 50)]
    private ?string $radio = null;

    #[ORM\ManyToOne(inversedBy: 'routes')]
    private ?Travel $travel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceStart(): ?string
    {
        return $this->placeStart;
    }

    public function setPlaceStart(string $placeStart): static
    {
        $this->placeStart = $placeStart;

        return $this;
    }

    public function getPlaceEnd(): ?string
    {
        return $this->placeEnd;
    }

    public function setPlaceEnd(string $placeEnd): static
    {
        $this->placeEnd = $placeEnd;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->timeStart;
    }

    public function setTimeStart(\DateTimeInterface $timeStart): static
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeInterface
    {
        return $this->timeEnd;
    }

    public function setTimeEnd(\DateTimeInterface $timeEnd): static
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    public function getNbVehicule(): ?string
    {
        return $this->nbVehicule;
    }

    public function setNbVehicule(?string $nbVehicule): static
    {
        $this->nbVehicule = $nbVehicule;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getRadio(): ?string
    {
        return $this->radio;
    }

    public function setRadio(string $radio): static
    {
        $this->radio = $radio;

        return $this;
    }

    public function getTravel(): ?Travel
    {
        return $this->travel;
    }

    public function setTravel(?Travel $travel): static
    {
        $this->travel = $travel;

        return $this;
    }
}
