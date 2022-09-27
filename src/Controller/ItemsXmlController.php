<?php

namespace App\Controller;

use App\Component\HttpFoundation\XmlResponse;
use App\Service\ItemService;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ItemsXmlController extends AbstractController
{

  private ItemService $itemService;

  public function __construct(ItemService $itemService, OrderService $orderService)
  {
    $this->itemService = $itemService;
    $this->orderService = $orderService;
  }
 

  /**
   * @Route("/items/xml/{id}", defaults={"_format"="xml"}, name="app_items_xml")
   */
  public function index($id)
  {
    $items = $this->itemService->getItems($id, $lang);
    if (!$items) {
      return $this->render('error.html.twig');
    }
    $xml = $this->get('serializer')->serialize($items, 'xml');
    return new XmlResponse($xml);
  }

  /**
   * @Route("/xml/items/availability/{id}", defaults={"_format"="xml"}, name="availability_xml")
   */
  public function availability($id, Request $request)
  {
    $lang = $request->query->get('lang', 'de');
    $items = $this->itemService->getItemsAvailability($id, $lang);
  
    if (!$items) {
      $items = $this->json(
          ['error' =>
            [
              "message" => "Resource not found."
            ]
          ], Response::HTTP_OK
      );
    }
    $xml = $this->get('serializer')->serialize($items, 'xml');
    return new XmlResponse($xml);
    
  }

  
   /**
   * @Route("/xml/order/{id}", defaults={"_format"="xml"}, name="order_xml")
   */
  public function getOrder($id)
  {
    $order = $this->orderService->getOrder($id);
    if (!$order) {
      $order = $this->json(
          ['error' =>
            [
              "message" => "Resource not found."
            ]
          ], Response::HTTP_OK
      );
    }
    $xml = $this->get('serializer')->serialize($order, 'xml');
    return new XmlResponse($xml);
    
  }

}
