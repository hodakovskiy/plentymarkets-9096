<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\OrderService;

class OrderController extends AbstractController
{

    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * @Route("/order", name="app_order")
     */
    public function index(): Response
    {
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }

    /**
     * @Route("/api/order/{id}", name="app_order_id" , methods={"GET"})
     */
 
    public function order($id): JsonResponse
    {
        $order = $this->orderService->getOrder($id);

        if ($order) {
            return $this->json($order);
        }

        return $this->json(
            [
                'error' =>
                [
                    "message" => "Order not found."
                ]
            ],
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/order/{id}", name="app_order_add", methods={"PUT"})
     */

    public function addOrder($id): JsonResponse
    {
    
        $this->orderService->addOrder($id);

        return $this->json(
            [
                'success' =>
                [
                    "message" => "Order added."
                ]
            ],
            Response::HTTP_OK
        );
    }
}
