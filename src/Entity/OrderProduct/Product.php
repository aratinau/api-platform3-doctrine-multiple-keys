<?php

namespace App\Entity\OrderProduct;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource()]
class Product
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private int $currentPrice;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCurrentPrice(): int
    {
        return $this->currentPrice;
    }

    /**
     * @param int $currentPrice
     */
    public function setCurrentPrice(int $currentPrice): void
    {
        $this->currentPrice = $currentPrice;
    }
}
