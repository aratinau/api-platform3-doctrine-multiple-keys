<?php

namespace App\Entity\Car;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ApiResource()]
class Car
{
    public function __construct(
        #[ORM\Id, ORM\Column]
        private string $name,
        #[ORM\Id, ORM\Column]
        private int $year,
    ) {
    }

    public function getModelName(): string
    {
        return $this->name;
    }

    public function getYearOfProduction(): int
    {
        return $this->year;
    }
}
