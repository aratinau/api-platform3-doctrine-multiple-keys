<?php

namespace App\Entity\OrderProduct;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\OrderProduct\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ApiResource()]
class Order
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private int|null $id = null;

    /** @var ArrayCollection<int, OrderItem> */
    #[ORM\OneToMany(mappedBy: 'order', targetEntity: OrderItem::class)]
    private Collection $items;

    #[ORM\Column]
    private bool $paid = false;
    #[ORM\Column]
    private bool $shipped = false;
    #[ORM\Column]
    private \DateTime $created;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: Customer::class)] private Customer $customer,
    ) {
        $this->items = new ArrayCollection();
        $this->created = new \DateTime("now");
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection<int, OrderItem>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(OrderItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setLienPersonneStructure($this);
        }

        return $this;
    }

    public function removeItem(OrderItem $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getLienPersonneStructure() === $this) {
                $item->setLienPersonneStructure(null);
            }
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     */
    public function setPaid(bool $paid): void
    {
        $this->paid = $paid;
    }

    /**
     * @return bool
     */
    public function isShipped(): bool
    {
        return $this->shipped;
    }

    /**
     * @param bool $shipped
     */
    public function setShipped(bool $shipped): void
    {
        $this->shipped = $shipped;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

}
