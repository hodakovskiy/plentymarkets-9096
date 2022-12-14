<?php

namespace App\Entity;

use App\Repository\VariationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VariationsRepository::class)
 */
class Variations
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $product_model;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $unit_info;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $market_availabilities;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="variations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(?string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode ?? '';
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getUnitInfo(): ?string
    {
        return $this->unit_info;
    }

    public function setUnitInfo(?string $unit_info): self
    {
        $this->unit_info = $unit_info;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getMarketAvailabilities(): ?string
    {
        return $this->market_availabilities;
    }

    public function getMarketAvailabilitiesArray(): ?array
    {
        return explode(',', $this->market_availabilities);
    }
  


    public function setMarketAvailabilities(?string $market_availabilities): self
    {
        $this->market_availabilities = $market_availabilities;

        return $this;
    }

    public function getProductModel(): ?string
    {
        return $this->product_model;
    }

    public function setProductModel(?string $product_model): self
    {
        $this->product_model = $product_model;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'category_name' => $this->getCategoryName(),
            'product_model' => $this->getProductModel(),
            'barcode' => $this->getBarcode(),
            'price' => $this->getPrice(),
            'unit_info' => $this->getUnitInfo(),
            'images' => $this->getImages(),
            'market_availabilities' => $this->getMarketAvailabilities()
        ];
    }
}
