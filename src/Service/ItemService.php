<?php

namespace App\Service;

use App\Entity\Variations;
use App\Model\ProductModel;
use App\Model\VariationsModel;
use App\Repository\ProductRepository;
use App\Repository\VariationsRepository;

class ItemService
{

  public ProductRepository $productRepository;
  public VariationsRepository $variationRepository;

  public function __construct(ProductRepository $productRepository, VariationsRepository $variationRepository)
  {

    $this->productRepository = $productRepository;
    $this->variationRepository = $variationRepository;
  }

  public function getItems($id)
  {

    if(!$items = $this->getProduct($id)) {
      return false;
    }

    $items = $items->toArray();

    $items['variations'] = $this->itemsVariations($items['id']);

    return $items;
  }

  public function getProduct($id)
  {
    $product = $this->productRepository->find($id);
    if(empty($product)) {
      return false;
    }
    return new ProductModel(
        $product->getId(),
        $product->getName(),
        $product->getDescription(),
    );
  }

  public function itemsVariations($productId)
  {
    $variations = $this->variationRepository->findProductVariation($productId);

    return array_map(
        fn(Variations $variations) => (new VariationsModel())
            ->setId($variations->getId())
            ->setNumber($variations->getNumber())
            ->setCategoryName($variations->getCategoryName())
            ->setModel($variations->getProductModel())
            ->setBarcode($variations->getBarcode())
            ->setUnitInfo($variations->getUnitInfo())
            ->setImages($variations->getImages())
            ->setMarketAvailabilities($variations->getMarketAvailabilities())->toArray()
        , $variations);
  }

}
