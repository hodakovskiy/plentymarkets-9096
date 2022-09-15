<?php

namespace App\Service;

use App\Entity\Variations;
use App\Entity\ProductText;
use App\Model\ProductModel;
use App\Model\VariationsModel;
use App\Model\ProductTextModel;
use App\Repository\ProductRepository;
use App\Repository\VariationsRepository;
use App\Repository\ProductTextRepository;

class ItemService
{

  public ProductRepository $productRepository;
  public VariationsRepository $variationRepository;
  public ProductTextRepository $productTextRepository;

  public function __construct(ProductRepository $productRepository, VariationsRepository $variationRepository, ProductTextRepository $productTextRepository)
  {

    $this->productRepository = $productRepository;
    $this->variationRepository = $variationRepository;
    $this->productTextRepository = $productTextRepository;
  }

  public function getItems($id, $lang = 'de')
  {

    if (!$items = $this->getProduct($id)) {
      return false;
    }



    $items = $items->toArray();
    $items['texts'] = $this->getProductTexts($id, $lang);
    $items['variations'] = $this->itemsVariations($items['id']);

    return $items;
  }



  public function getProduct($id)
  {
    $product = $this->productRepository->find($id);
    if (empty($product)) {
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
      fn (Variations $variations) => (new VariationsModel())
        ->setId($variations->getId())
        ->setNumber($variations->getNumber())
        ->setCategoryName($variations->getCategoryName())
        ->setModel($variations->getProductModel())
        ->setBarcode($variations->getBarcode())
        ->setPrice($variations->getPrice())
        ->setUnitInfo($variations->getUnitInfo())
        ->setImages($variations->getImages())
        ->setMarketAvailabilities($variations->getMarketAvailabilities())->toArray(),
      $variations
    );
  }

  public function getProductTexts($id, $lang)
  {
    $productTexts =  $this->productTextRepository->findTexts($id, $lang);

    if (empty($productTexts)) {
      return false;
    }

    return array_map(
      fn (ProductText $productTexts) => (new ProductTextModel())
        ->setId($productTexts->getId())
        ->setLang($productTexts->getLang())
        ->setName1($productTexts->getName1())
        ->setName2($productTexts->getName2())
        ->setName3($productTexts->getName3())
        ->setShortDescription($productTexts->getShortDescription())
        ->setMetaDescription($productTexts->getMetaDescription())
        ->setDescription($productTexts->getDescription())
        ->setTechnicalData($productTexts->getTechnicalData())
        ->setUrlPath($productTexts->getUrlPath())
        ->setKeywords($productTexts->getKeywords()),
      $productTexts
    );
  }


/**
 * Undocumented function
 *
 * @param int $id // market id
 * @param string $lang
 * @return void
 *
 */
  public function getItemsAvailability ($id, $lang = 'de')
  {
    $variations = $this->variationRepository->findAll();

    $productIds =  array_map(function ($variations) use ($id) {
      if(in_array($id, $variations->getMarketAvailabilitiesArray())) {
        return $variations->getProduct()->getId();
      }
    },$variations);

    $productIds = array_unique($productIds);
    $productIds = array_filter($productIds);

    if(empty($productIds)) {
      return false;
    }

    $items = array_map(function ($productIds) use ($lang) {
      return $this->getItems($productIds, $lang);
    }, $productIds);

    return $items;

  }


}
