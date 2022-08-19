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

  public function get($id)
  {
    $url =  '/items/' . $id;
    $method = 'GET';
    $data = false;
    $result = $this->baseApiService->requestApi($url, $method, $data);
    return $result;
  }
}
