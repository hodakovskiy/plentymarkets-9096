<?php

namespace App\Controller;

use App\Component\HttpFoundation\XmlResponse;
use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use function dd;


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
    $encoder = new XmlEncoder();


    $item = $this->itemService->getItems($id);

    $result = $encoder->encode($item, 'xml');


    return new XmlResponse($result);
  }

}
