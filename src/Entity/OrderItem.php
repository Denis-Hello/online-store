<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
class OrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $volume = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $price = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "order_id", nullable: false)]
    private ?order $order_id = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(name: "product_id", nullable: false)]
    private ?products $product_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getOrderId(): ?order
    {
        return $this->order_id;
    }

    public function setOrderId(?order $order_id): static
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getProductId(): ?products
    {
        return $this->product_id;
    }

    public function setProductId(products $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }
}
