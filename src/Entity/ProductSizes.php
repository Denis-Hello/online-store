<?php

namespace App\Entity;

use App\Repository\ProductSizesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductSizesRepository::class)]
class ProductSizes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?products $product_id = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?sizes $size_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

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

    public function getSizeId(): ?sizes
    {
        return $this->size_id;
    }

    public function setSizeId(sizes $size_id): static
    {
        $this->size_id = $size_id;

        return $this;
    }
}