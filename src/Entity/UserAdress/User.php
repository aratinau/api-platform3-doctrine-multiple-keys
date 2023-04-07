<?php

namespace App\Entity\UserAdress;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource()]
class User
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
