<?php
namespace App\Service\Http\accounts;

use App\Service\Http\BaseApiService;

class AccountsContactsHttpService extends BaseApiService
{
    /**
     * @param $id int accounts ID
     * @return array|bool
     */
    public function get($id)
    {
      $url = "/accounts/contacts/$id";
      $method = 'GET';
      $data = false;
      $result = $this->requestApi($url, $method, $data);
  
      if(empty($result['entries'])) {
        return false;
      }
  
  
      return $result['entries'];
    }
    
}