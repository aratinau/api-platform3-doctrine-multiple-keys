<?php

namespace App\Entity\OrderProduct;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource()]
class Customer
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private int|null $id = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
