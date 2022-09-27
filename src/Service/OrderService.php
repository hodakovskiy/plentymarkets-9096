<?php

namespace App\Service;


use App\Mapper\OrderMapper;
use App\Repository\OrderRepository;
use App\Service\Http\OrderHttpService;
//use App\Service\Help\WebStores\WebStoresHelp;

class OrderService
{

    public OrderRepository $orderRepository;
    public OrderHttpService $orderHttpService;

    public function __construct(
        OrderHttpService $orderHttpService,
        OrderRepository $orderRepository
        //WebStoresHelp $webStoresHelp
    ) {
        $this->orderHttpService = $orderHttpService;
        $this->orderRepository = $orderRepository;
        //$this->webStoresHelp = $webStoresHelp;
    }

    /**
     *
     * @param type $id
     * @return Order
     */
    public function getOrder($id)
    {
        $order =  json_decode('{
            "id": 155,
            "clientName": "Klaus Wowereit",
            "address" : "Gustav-Mueller-Strasse 1, 10829 Berlin, Berlin, Germany",
            "market":"Standard Shop 1",
            "aboutProduct":{
              "itemVariationId": 2876,
              "orderItemName":"en Shorts",
              "attributeValues":"black",
              "currency":"EUR",
              "priceOriginalGross":10
            }
                     
           }');
        return $order;
    }

    /**
     *
     * @param type $id
     *
     * @return Order
     */

    public function addOrder($id){
       // $order = $this->orderHttpService->get($id);

        //if (!$order) {
        //    return false;
       // }

        $order =  json_decode('{
            "id": 155,
            "clientName": "Klaus Wowereit",
            "address" : "Gustav-Mueller-Strasse 1, 10829 Berlin, Berlin, Germany",
            "market":"Standard Shop 1",
            "aboutProduct":{
              "itemVariationId": 2876,
              "orderItemName":"en Shorts",
              "attributeValues":"black",
              "currency":"EUR",
              "priceOriginalGross":10
            }
                     
           }');

     

        dd($order );
        $order = OrderMapper::map($order);
       
        $this->orderRepository->save($order);
    }
}
