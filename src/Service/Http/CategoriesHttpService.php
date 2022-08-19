<?php

namespace App\Service\Http;

use App\Service\Http\BaseApiService;


class CategoriesHttpService extends BaseApiService
{



  public function get($id)
  {
    $url = '/categories/' . $id;
    $method = 'GET';
    $data = false;
    $result = $this->requestApi($url, $method, $data);

    if (empty($result['entries'])) {
      return false;
    }


    return $result['entries'];
  }
}
