<?php
namespace App\Service\Help\WebStores;

use App\Service\Http\WebStores\WebStoresHttpService;

class WebStoresHelp
{

    public WebStoresHttpService $webStoresHttpService;

    public function __construct(WebStoresHttpService $webStoresHttpService)
    {
        $this->webStoresHttpService = $webStoresHttpService;
    }

    public function getWebStores()
    {
        $webStores = $this->webStoresHttpService->get();
        return $webStores;
    }
}
