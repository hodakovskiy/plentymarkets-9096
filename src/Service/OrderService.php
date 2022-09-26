<?php

namespace App\Service;


use App\Mapper\OrderMapper;
use App\Repository\OrderRepository;
use App\Service\Http\OrderHttpService;
use App\Service\Help\WebStores\WebStoresHelp;

class OrderService
{

    public OrderRepository $orderRepository;
    public OrderHttpService $orderHttpService;

    public function __construct(
        OrderHttpService $orderHttpService,
        OrderRepository $orderRepository,
        WebStoresHelp $webStoresHelp
    ) {
        $this->orderHttpService = $orderHttpService;
        $this->orderRepository = $orderRepository;
        $this->webStoresHelp = $webStoresHelp;
    }

    /**
     *
     * @param type $id
     * @return Order
     */
    public function getOrder($id)
    {
        $order = $this->orderRepository->find($id);
        return $order;
    }

    /**
     *
     * @param type $id
     *
     * @return Order
     */

    public function addOrder($id){
        $order = $this->orderHttpService->get($id);

        if (!$order) {
            return false;
        }



        $order = OrderMapper::map($order);

        dd($order );
        $order = OrderMapper::map($order);
       
        $this->orderRepository->save($order);
    }
}
