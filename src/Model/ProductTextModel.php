<?php
namespace App\Model;

class ProductTextModel 
{

    private $id;
    private $lang;
    private $name1;
    private $name2;
    private $name3;
    private $shortDescription;
    private $metaDescription;
    private $description;
    private $technicalData;
    private $urlPath;
    private $keywords;

 

    public function getId(): int
    {
        return $this->id;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function getName1(): string
    {
        return $this->name1;
    }

    public function getName2(): string
    {
        return $this->name2;
    }

    public function getName3(): string
    {
        return $this->name3;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }   

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTechnicalData(): string
    {
        return $this->technicalData;
    }   

    public function getUrlPath(): string
    {
        return $this->urlPath;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function setLang(string $lang)
    {
        $this->lang = $lang;
        return $this;
    }

    public function setName1(string $name1)
    {
        $this->name1 = $name1;
        return $this;
    }

    public function setName2(string $name2)
    {
        $this->name2 = $name2;
        return $this;
    }

    public function setName3(string $name3)
    {
        $this->name3 = $name3;
        return $this;
    }   

    public function setShortDescription(string $shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }   

    public function setMetaDescription(string $metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setTechnicalData(string $technicalData)
    {
        $this->technicalData = $technicalData;
        return $this;
    }

    public function setUrlPath(string $urlPath)
    {
        $this->urlPath = $urlPath;
        return $this;
    }

    public function setKeywords(string $keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }


    public function toArray() {
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
        ];
    }


}