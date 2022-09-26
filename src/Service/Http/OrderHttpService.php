<?php
namespace App\Service\Http;

use App\Service\Http\BaseApiService;

class OrderHttpService  extends BaseApiService
{
    /**
     * @param $id int Order ID
     * @return array|bool
     */
    public function get($id)
    {
      $url = "/orders/{$id}?with[]=contactSender&with[]=addresses";
      $method = 'GET';
      $data = false;
      $result = $this->requestApi($url, $method, $data);

      if( isset($result['error'] )) {
        return false;
      }

      return $result;
    }
    
}