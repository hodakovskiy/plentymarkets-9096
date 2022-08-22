<?php

namespace App\Mapper;

use App\Entity\Variations;
use App\Service\Http\CategoriesHttpService;

class VariationsMapper
{

  public function __construct(CategoriesHttpService $categoriesHttpService)
  {
    $this->categoriesHttpService = $categoriesHttpService;
  }

  public function __invoke(array $variation, ?Variations $target = null): Variations
  {
    if (!$target) {
      $target = new Variations();
    }

    return $target
            ->setId($variation['id'])
            ->setNumber($variation['number'])
            ->setCategoryName($this->getCategoryName($variation))
            ->setProductModel($variation['model'])
            ->setBarcode($this->getBarcode($variation))
            ->setPrice($this->getPrice($variation))
            ->setUnitInfo($this->getUnitInfo($variation))
            ->setImages($this->getImages($variation))
            ->setMarketAvailabilities($this->getMarketAvailabilities($variation));
  }

  private function getCategoryName($variation)
  {

    $variationsId = $variation['variationCategories'][0]['categoryId'];
    $category = $this->categoriesHttpService->get($variationsId);
    $categories = current($category);

    return current($categories['details'])['name'];
  }

  private function getBarcode($variation)
  {
    return current($variation['variationBarcodes'])['code'];
  }

  private function getPrice($variation)
  {
    return $variation['variationSalesPrices'][0]['price'];
  }

  private function getUnitInfo($variation)
  {

    $unitInfo = [
      'weightG' => $variation['weightG'],
      'weightNetG' => $variation['weightNetG'],
      'widthMM' => $variation['widthMM'],
      'lengthMM' => $variation['lengthMM'],
      'heightMM' => $variation['heightMM'],
    ];

    return json_encode($unitInfo);
  }

  private function getImages($variation)
  {

    return $variation['images'][0]['url'] ?? null;
  }

  private function getMarketAvailabilities($variation)
  {

    $variationMarkets = array_column($variation['VariationMarkets'], 'marketId');
    return implode(",", $variationMarkets);
  }

}
