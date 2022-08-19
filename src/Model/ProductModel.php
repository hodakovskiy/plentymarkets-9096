<?php

namespace App\Model;

class ProductModel
{

  public function __construct(int $id, int $itemId, string $name, string $description)
  {
    $this->id = $id;
    $this->itemId = $itemId;
    $this->name = $name;
    $this->description = $description;
  }

    /**
   * @var int
   */
  private $id;

  /**
   * @var int
   */
  private $itemId;

  /**
   * @var string
   */
  private $name;

  /**
   * @var string
   */
  private $description;

  public function getId(): int
  {
    return $this->id;
  }

  public function getItemId(): int
  {
    return $this->itemId;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setId(int $id)
  {
    $this->id = $id;
    return $this;
  }

  public function setItemId(int $itemId)
  {
    $this->itemId = $itemId;
    return $this;
  }

  public function setName(string $name)
  {
    $this->name = $name;
    return $this;
  }

  public function setDescription(string $description)
  {
    $this->description = $description;
    return $this;
  }

  public function toArray()
  {
    return [
      'id' => $this->id,
      'itemId' => $this->itemId,
      'name' => $this->name,
      'description' => $this->description,
    ];
  }

}
