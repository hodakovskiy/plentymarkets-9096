<?php


namespace App\Service\Http;

use App\Service\Http\BaseApiService;

/**
 * Description of ProductsHttpService
 *
 * @author sergey
 */
class ProductsHttpService
{

  private BaseApiService $baseApiService;

  public function __construct(BaseApiService $baseApiService)
  {
    $this->baseApiService = $baseApiService;
  }

  /**
   * Get items from API
   *
   * @param [type] $id
   * @param string $lang
   * @return void
   */
 
  public function get($id, $lang = 'de')
  {
    $url =  '/items/' . $id. '?lang=' . $lang;
    $method = 'GET';
    $data = false;
    $result = $this->baseApiService->requestApi($url, $method, $data);
    return $result;
  }
}
