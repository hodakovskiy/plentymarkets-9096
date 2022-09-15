<?php

namespace App\Entity;

use App\Repository\MarketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarketRepository::class)
 */
class Market
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Variations::class, inversedBy="markets")
     */
    private $VariationMarkets;

    public function __construct()
    {
        $this->VariationMarkets = new ArrayCollection();
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
     * @return Collection<int, Variations>
     */
    public function getVariationMarkets(): Collection
    {
        return $this->VariationMarkets;
    }

    public function addVariationMarket(Variations $variationMarket): self
    {
        if (!$this->VariationMarkets->contains($variationMarket)) {
            $this->VariationMarkets[] = $variationMarket;
        }

        return $this;
    }

    public function removeVariationMarket(Variations $variationMarket): self
    {
        $this->VariationMarkets->removeElement($variationMarket);

        return $this;
    }
}
