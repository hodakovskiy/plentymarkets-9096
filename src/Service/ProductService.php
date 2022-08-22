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
   * @param type $id
   * @return Product
   */
  public function getProductById($id)
  {
    $product = $this->productRepository->find($id);
    return $product;
  }
  
  /**
   *
   * @param type $id
   * @return Variations
   */
  public function getVariationById($id)
  {
    $variation = $this->variationRepository->find($id);
    return $variation;
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
    $this->productRepository->add($product, true);

    $variations = array_map(function ($variation) use ($product) {

      $variationOld = $this->getVariationById($variation['id']);

      $variation = (new VariationsMapper($this->categoriesHttpService))($variation, $variationOld);
      $variation->setProduct($product);
      return $variation;
    }, $this->variationsHttpService->get($id));

    $this->variationRepository->saveAll($variations, true);



  }

}
