<?php
namespace App\Mapper;

use App\Entity\ProductText;

class ProductTextMapper {

    public function __invoke(array $productText, ?ProductText $target = null): ProductText {
        if (!$target) {
            $target = new ProductText();
        }
   
        return $target
                ->setLang($productText['lang'])
                ->setName1($productText['name1'])
                ->setName2($productText['name2'])
                ->setName3($productText['name3'])
                ->setShortDescription($productText['shortDescription'])
                ->setMetaDescription($productText['metaDescription'])
                ->setDescription($productText['description'])
                ->setKeywords($productText['keywords'])
                ->setTechnicalData($productText['technicalData'])
                ->setUrlPath($productText['urlPath']);
    }

}

