<?php

namespace App\Service;

use App\Entity\Product;
use App\Entity\Variations;
use App\Mapper\ProductMapper;
use App\Mapper\VariationsMapper;
use App\Repository\ProductRepository;

use App\Repository\VariationsRepository;
use App\Service\Http\ProductsHttpService;
use App\Service\Http\CategoriesHttpService;
use App\Service\Http\VariationsHttpService;

class ProductService
{

  public ProductRepository $productRepository;
  public VariationsRepository $variationRepository;

  public function __construct(
    ProductsHttpService $productsHttpService,
    VariationsHttpService  $variationsHttpService,
    CategoriesHttpService $categoriesHttpService,
    ProductRepository $productRepository,
    VariationsRepository $variationRepository


  ) {
    $this->productsHttpService = $productsHttpService;
    $this->productRepository = $productRepository;
    $this->variationRepository = $variationRepository;
    $this->variationsHttpService = $variationsHttpService;
    $this->categoriesHttpService = $categoriesHttpService;
  }


  /**
   *
   * @param type $itemId
   * @return Product
   */
  public function getProductById($itemId)
  {
    $product = $this->productRepository->findByItem($itemId);
    return $product;
  }

  /**
   *
   * @param Product $product
   * @param array $variations
   * @return void
   */
  public function addProductById($id)
  {

    $productHttp = $this->productsHttpService->get($id);
    $product = (new ProductMapper)($productHttp, $this->getProductById($id));

    $variations = array_map(function ($variation) use ($product) {

      $variation = (new VariationsMapper($this->categoriesHttpService))($variation, new Variations);
      $variation->setProduct($product);
      return $variation;
    }, $this->variationsHttpService->get($id));


    foreach ($variations as $variation) {
      $product->addVariation($variation);
    }


    $this->productRepository->add($product, true);


  }

}
