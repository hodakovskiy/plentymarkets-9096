<?php

namespace App\Controller;

use App\Component\HttpFoundation\XmlResponse;
use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ItemsXmlController extends AbstractController
{

  private ItemService $itemService;

  public function __construct(ItemService $itemService)
  {
    $this->itemService = $itemService;
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

}
