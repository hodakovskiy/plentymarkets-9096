<?php

namespace App\Mapper;

use App\Entity\Product;

class ProductMapper
{

    public function __invoke(array $product, ?Product $target = null): Product
    {
        if (!$target) {
            $target = new Product();
        }
        $texts = $product['texts'][0];

        return  $target
                ->setId($product['id'])
                ->setName($texts['name1'])
                ->setDescription($texts['description']);
    }

    static public function map(array $product, ?Product $target = null): Product
    {
        return (new self())($product, $target);
    }

}
