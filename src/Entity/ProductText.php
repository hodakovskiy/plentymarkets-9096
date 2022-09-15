<?php

namespace App\Entity;

use App\Repository\ProductTextRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductTextRepository::class)
 */
class ProductText
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $lang;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name3;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $metaDescription;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $technicalData;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="texts")
     */
    private $product;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getName1(): ?string
    {
        return $this->name1;
    }

    public function setName1(?string $name1): self
    {
        $this->name1 = $name1;

        return $this;
    }

    public function getName2(): ?string
    {
        return $this->name2;
    }

    public function setName2(string $name2): self
    {
        $this->name2 = $name2;

        return $this;
    }

    public function getName3(): ?string
    {
        return $this->name3;
    }

    public function setName3(string $name3): self
    {
        $this->name3 = $name3;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

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

    public function getTechnicalData(): ?string
    {
        return $this->technicalData;
    }

    public function setTechnicalData(?string $technicalData): self
    {
        $this->technicalData = $technicalData;

        return $this;
    }

    public function getUrlPath(): ?string
    {
        return $this->urlPath;
    }

    public function setUrlPath(?string $urlPath): self
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }



    public function __toString()
    {
        return $this->name1;
    }

    public function  toArray() : array
    {
        return [
            'id' => $this->id,
            'lang' => $this->lang,
            'name1' => $this->name1,
            'name2' => $this->name2,
            'name3' => $this->name3,
            'shortDescription' => $this->shortDescription,
            'metaDescription' => $this->metaDescription,
            'description' => $this->description,
            'technicalData' => $this->technicalData,
            'urlPath' => $this->urlPath,
            'keywords' => $this->keywords,
            'product' => $this->product,
        ];
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
}
