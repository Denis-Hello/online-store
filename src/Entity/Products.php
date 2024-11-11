<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $price = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $gender = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(name: "brand_id", nullable: false)]
    private ?brands $brand_id = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(name: "category_id", nullable: false)]
    private ?categories $category_id = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(name: "size_id", nullable: false)]
    private ?sizes $size_id = null;

    /**
     * @var Collection<int, Questions>
     */
    #[ORM\OneToMany(targetEntity: Questions::class, mappedBy: 'product_id', orphanRemoval: true)]
    private Collection $questions;

    /**
     * @var Collection<int, Comments>
     */
    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'product_id', orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(int $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBrandId(): ?brands
    {
        return $this->brand_id;
    }

    public function setBrandId(?brands $brand_id): static
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    public function getCategoryId(): ?categories
    {
        return $this->category_id;
    }

    public function setCategoryId(?categories $category_id): static
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getSizeId(): ?sizes
    {
        return $this->size_id;
    }

    public function setSizeId(?sizes $size_id): static
    {
        $this->size_id = $size_id;

        return $this;
    }

    /**
     * @return Collection<int, Questions>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Questions $question): static
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setProductId($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $question): static
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getProductId() === $this) {
                $question->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setProductId($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProductId() === $this) {
                $comment->setProductId(null);
            }
        }

        return $this;
    }
}
