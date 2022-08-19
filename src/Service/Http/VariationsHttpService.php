<?php

namespace App\Service\Http;

use App\Service\Http\BaseApiService;


class VariationsHttpService extends BaseApiService
{

  public function get($id)
  {
    $url = '/items/'.$id.'/variations?with=variationCategories,variationBarcodes,images,variationSalesPrices,VariationMarkets';
    $method = 'GET';
    $data = false;
    $result = $this->requestApi($url, $method, $data);

    if(empty($result['entries'])) {
      return false;
    }


    return $result['entries'];
  }



}
