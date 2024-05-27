<?php

namespace App\Entity;

use App\Repository\DescritpionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescritpionRepository::class)]
class Descritpion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_descritpion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgDescritpion(): ?string
    {
        return $this->img_descritpion;
    }

    public function setImgDescritpion(?string $img_descritpion): static
    {
        $this->img_descritpion = $img_descritpion;

        return $this;
    }
}
