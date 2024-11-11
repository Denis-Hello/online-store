<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PHPUnit\Util\Type;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $order_date = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $status = null;

    #[ORM\Column(type: Types::INTEGER,nullable: true)]
    private ?int $discount = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $total_amount = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "dilivery_addres_id", nullable: false)]
    private ?addresses $dilivery_addres_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "user_id", nullable: false)]
    private ?user $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeImmutable
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeImmutable $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): static
    {
        $this->discount = $discount;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getDiliveryAddresId(): ?addresses
    {
        return $this->dilivery_addres_id;
    }

    public function setDiliveryAddresId(?addresses $dilivery_addres_id): static
    {
        $this->dilivery_addres_id = $dilivery_addres_id;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
