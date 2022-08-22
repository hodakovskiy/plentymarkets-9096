<?php

namespace App\Model;

class ProductModel
{

  public function __construct(int $id, string $name, string $description)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
  }

    /**
   * @var int
   */
  private $id;

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
      'name' => $this->name,
      'description' => $this->description,
    ];
  }

}
