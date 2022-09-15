<?php

namespace App\Service;

use App\Entity\Market;
use App\Entity\Product;
use App\Entity\Variations;
use App\Entity\ProductTexts;
use App\Mapper\ProductMapper;
use App\Mapper\VariationsMapper;
use App\Mapper\ProductTextMapper;
use App\Repository\ProductRepository;
use App\Repository\VariationsRepository;
use App\Repository\ProductTextRepository;
use App\Service\Http\ProductsHttpService;
use App\Service\Http\CategoriesHttpService;
use App\Service\Http\VariationsHttpService;


class ProductService
{

  public ProductRepository $productRepository;
  public VariationsRepository $variationRepository;
  public ProductTextRepository $productTextRepository;

  public function __construct(
    ProductsHttpService $productsHttpService,
    VariationsHttpService  $variationsHttpService,
    CategoriesHttpService $categoriesHttpService,
    ProductRepository $productRepository,
    VariationsRepository $variationRepository,
    ProductTextRepository $productTextRepository


  ) {
    $this->productsHttpService = $productsHttpService;
    $this->productRepository = $productRepository;
    $this->variationRepository = $variationRepository;
    $this->variationsHttpService = $variationsHttpService;
    $this->categoriesHttpService = $categoriesHttpService;
    $this->productTextRepository = $productTextRepository;
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
  public function addProductById($id, string $language = 'de')
  {
 
    $productHttp = $this->productsHttpService->get($id,$language);
   
    $product = (new ProductMapper)($productHttp, $this->getProductById($id));
    $this->productRepository->add($product, true);

    $productTexts = array_map(function ($texts) use ($product) {

      $productTextsOld = $this->productTextRepository->findTextLanguage($product->getId(), $texts['lang']);
      $text = (new ProductTextMapper)($texts, $productTextsOld);
      $product->addText($text);
     
    }, $productHttp['texts']);


    $variations = array_map(function ($variation) use ($product) {

      $variationOld = $this->getVariationById($variation['id']);
  
      $variation = (new VariationsMapper($this->categoriesHttpService))($variation, $variationOld);
      $variation->setProduct($product);

      return $variation;
    }, $this->variationsHttpService->get($id));

    $this->variationRepository->saveAll($variations, true);

    



  }




}
