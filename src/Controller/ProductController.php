<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ProductService;
use App\Repository\ProductRepository;
use App\Service\ItemService;

class ProductController extends AbstractController
{

  private ProductService $productService;

  public function __construct(ProductService $productService, ProductRepository $productRepository, ItemService $itemService)
  {
    $this->productService = $productService;
    $this->productRepository = $productRepository;
    $this->itemService = $itemService;
  }

  /**
   * @Route("/api/items/{id}", name="get_items", methods={"GET"}))
   */
  public function index($id): JsonResponse
  {
    $item = $this->itemService->getItems($id);

    if ($item) {
      return $this->json($item);
    }

    return $this->json(
            ['error' =>
              [
                "message" => "Resource not found."
              ]
            ], Response::HTTP_OK
    );
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
