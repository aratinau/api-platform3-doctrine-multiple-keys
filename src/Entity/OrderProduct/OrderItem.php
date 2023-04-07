<?php

namespace App\Entity\OrderProduct;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource()]
class OrderItem
{
    #[ORM\Id, ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'items')]
    private Order|null $order = null;

    #[ORM\Id, ORM\ManyToOne(targetEntity: Product::class)]
    private Product|null $product = null;

    #[ORM\Column]
    private int $amount = 1;

    #[ORM\Column]
    private int $offeredPrice;

    public function __construct(Order $order, Product $product, int $amount = 1)
    {
        $this->order = $order;
        $this->product = $product;
        $this->offeredPrice = $product->getCurrentPrice();
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     */
    public function setOrder(?Order $order): void
    {
        $this->order = $order;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     */
    public function setProduct(?Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getOfferedPrice(): int
    {
        return $this->offeredPrice;
    }

    /**
     * @param int $offeredPrice
     */
    public function setOfferedPrice(int $offeredPrice): void
    {
        $this->offeredPrice = $offeredPrice;
    }
}
