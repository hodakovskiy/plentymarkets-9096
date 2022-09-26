<?php
namespace App\Service\Http\WebStores;

use App\Service\Http\BaseApiService;

class WebStoresHttpService extends BaseApiService
{
    /**
     * @param $id int webstores ID
     * @return array|bool
     */
    public function get()
    {
      $url = "/webstores";
      $method = 'GET';
      $data = false;
      $result = $this->requestApi($url, $method, $data);

      if( isset($result['error'] )) {
        return false;
      }

      return $result;
    }

}