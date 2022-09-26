<?php

namespace App\Controller;

use App\Service\ItemService;
use App\Service\ProductService;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
  public function addProductById($id,Request $request): JsonResponse
  {
    $lang = $request->query->get('lang','de');
    $this->productService->addProductById($id, $lang );

    return $this->json('success', Response::HTTP_OK);
  }

  /**
   * @Route("/api/items/availability/{id}", name="get_id", methods={"GET"})
   * @return JsonResponse
   */
  public function availability($id, Request $request): JsonResponse
  {
    $lang = $request->query->get('lang','de');
    $item = $this->itemService->getItemsAvailability($id, $lang );

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


}
