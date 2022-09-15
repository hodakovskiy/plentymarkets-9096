<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Variations::class, mappedBy="product", orphanRemoval=true, cascade={"persist"})
     */
    private $variations;


    /**
     * @ORM\OneToMany(targetEntity=ProductText::class, mappedBy="product", orphanRemoval=true, cascade={"persist"})
     */
    private $texts;
    
 
    public function __construct()
    {
        $this->variations = new ArrayCollection();
        $this->productTexts = new ArrayCollection();
        $this->texts = new ArrayCollection();
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Variations>
     */
    public function getVariations(): Collection
    {
        return $this->variations;
    }

    public function setVariations(Collection $variation): self
    {
        $this->variation = $variation;

        return $this;
    }

    public function addVariation(Variations $variation): self
    {
        if (!$this->variations->contains($variation)) {
            $this->variations[] = $variation;
            $variation->setProduct($this);
        }

        return $this;
    }

    public function removeVariation(Variations $variation): self
    {
        if ($this->variations->removeElement($variation)) {
            // set the owning side to null (unless already changed)
            if ($variation->getProduct() === $this) {
                $variation->setProduct(null);
            }
        }

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'variations' => $this->variations->toArray()
        ];
    }

    /**
     * @return Collection<int, ProductText>
     */
    public function getTexts(): Collection
    {
        return $this->texts;
    }

    public function addText(ProductText $text): self
    {
        if (!$this->texts->contains($text)) {
            $this->texts[] = $text;
            $text->setProduct($this);
        }

        return $this;
    }

    public function removeText(ProductText $text): self
    {
        if ($this->texts->removeElement($text)) {
            // set the owning side to null (unless already changed)
            if ($text->getProduct() === $this) {
                $text->setProduct(null);
            }
        }

        return $this;
    }

}
