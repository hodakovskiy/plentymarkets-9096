<?php

namespace App\Model;

/**
 * Description of VariationsModel
 *
 * @author sergey
 */
class VariationsModel
{

  private $id;
  private $number;
  private $category_name;
  private $model;
  private $barcode;
  private $price;
  private $unit_info;
  private $images;
  private $market_availabilities;

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

  public function setNumber(string $number): self
  {
    $this->number = $number;

    return $this;
  }

  public function getCategoryName(): ?string
  {
    return $this->category_name;
  }

  public function setCategoryName(string $category_name): self
  {
    $this->category_name = $category_name;

    return $this;
  }

  public function getBarcode(): ?string
  {
    return $this->barcode;
  }

  public function setBarcode(string $barcode = ""): self
  {
    $this->barcode = $barcode;

    return $this;
  }

  public function getUnitInfo(): ?string
  {
    return $this->unit_info;
  }

  public function setUnitInfo(string $unit_info): self
  {
    $this->unit_info = $unit_info;

    return $this;
  }

  public function getImages(): ?string
  {
    return $this->images;
  }

  public function setImages(string $images): self
  {
    $this->images = $images;

    return $this;
  }

  public function getMarketAvailabilities(): ?string
  {
    return $this->market_availabilities;
  }

  public function setMarketAvailabilities(string $market_availabilities): self
  {
    $this->market_availabilities = $market_availabilities;

    return $this;
  }

  /**
   * Get the value of model
   */
  public function getModel()
  {
    return $this->model;
  }

  /**
   * Set the value of model
   *
   * @return  self
   */
  public function setModel($model)
  {
    $this->model = $model;

    return $this;
  }

  /**
   * Get the value of price
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }


  public function toArray(): array
  {
    return [
      'id' => $this->getId(),
      'number' => $this->getNumber(),
      'category_name' => $this->getCategoryName(),
      'model' => $this->getModel(),
      'barcode' => $this->getBarcode(),
      'price' => $this->getPrice(),
      'unit_info' => json_decode($this->getUnitInfo(),true),
      'images' => $this->getImages(),
      'market_availabilities' => $this->getMarketAvailabilities()
    ];
  }


}
