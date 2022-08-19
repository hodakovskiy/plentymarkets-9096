<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ProductService;
use App\Repository\ProductRepository;


class ProductController extends AbstractController
{

  private ProductService $productService;

  public function __construct(ProductService $productService, ProductRepository $productRepository)
  {
    $this->productService = $productService;
    $this->productRepository  = $productRepository;
  }


  /**
   * @Route("/api/items/{id}", name="add_product_id", methods={"PUT"})
   * @return JsonResponse
   */
  public function addProductById($id): JsonResponse
  {

    $this->productService->addProductById($id);

    return $this->json('success', Response::HTTP_OK);
  }

}
