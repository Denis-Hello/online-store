<?php

namespace App\Entity;

use App\Repository\ProductPhotosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductPhotosRepository::class)]
class ProductPhotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private ?string $photo_url = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "product_id", nullable: false)]
    private ?products $product_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(string $photo_url): static
    {
        $this->photo_url = $photo_url;

        return $this;
    }

    public function getProductId(): ?products
    {
        return $this->product_id;
    }

    public function setProductId(?products $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }
}
