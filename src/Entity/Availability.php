<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvailabilityRepository;

/**
 * @ORM\Entity(repositoryClass=AvailabilityRepository::class)
 */
class Availability
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
 
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="availabilities")
     */
    private $Product;

    /**
     * @ORM\ManyToMany(targetEntity=Variations::class, mappedBy="availabilities")
     */
    private $variations;

    public function __construct()
    {
        $this->Product = new ArrayCollection();
        $this->variations = new ArrayCollection();
    }

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->Product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->Product->contains($product)) {
            $this->Product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->Product->removeElement($product);

        return $this;
    }

    /**
     * @return Collection<int, Variations>
     */
    public function getVariations(): Collection
    {
        return $this->variations;
    }

    public function addVariation(Variations $variation): self
    {
        if (!$this->variations->contains($variation)) {
            $this->variations[] = $variation;
            $variation->addAvailability($this);
        }

        return $this;
    }

    public function removeVariation(Variations $variation): self
    {
        if ($this->variations->removeElement($variation)) {
            $variation->removeAvailability($this);
        }

        return $this;
    }

  

    
}
