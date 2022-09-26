<?php
namespace App\Mapper;

class OrderMapper {

    private $id;
    private $clientName;
    private $address;
    private $market;
    private $aboutProduct;

    public function __construct($id, $clientName, $address, $market, $aboutProduct) {
        $this->id = $id;
        $this->clientName = $clientName;
        $this->address = $address;
        $this->market = $market;
        $this->aboutProduct = $aboutProduct;
    }

    /**
     *  @return OrderMapper
     */

     public static function map($order): OrderMapper
     {
        dd($order);
          return new OrderMapper(
                $order->id,
                $order->clientName,
                $order->address,
                $order->market,
                $order->aboutProduct
          );
     }

     public function getId()
     {
       return $this->id;
     }

     public function getClientName()
     {
       return $this->clientName;
     }

     public function getAddress()
     {
       return $this->address;
     }

     public function getMarket()
     {
       return $this->market;
     }

     public function getAboutProduct()
     {
       return $this->aboutProduct;
     }

     public function setId($id)
     {
       $this->id = $id;
       return $this;
     }

     public function setClientName($clientName)
     {
       $this->clientName = $clientName;
       return $this;
     }

     public function setAddress($address)
     {
       $this->address = $address;
       return $this;
     }

     public function setMarket($market)
     {
       $this->market = $market;
       return $this;
     }

     public function setAboutProduct($aboutProduct)
     {
       $this->aboutProduct = $aboutProduct;
       return $this;
     }




}