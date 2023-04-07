<?php

namespace App\Entity\UserAdress;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource()]
class Address
{
    #[ORM\Id, ORM\OneToOne(targetEntity: User::class)]
    private User|null $user = null;

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }


}
