<?php
namespace App\Mapper\Webstores;

use App\Entity\WebStores;

class WebStoresMapper
{
    public function __invoke(array $webstores, ?WebStores $target = null): WebStores
    {
        if (!$target) {
            $target = new WebStores();
        }

        return  $target
                ->setId($webstores['id'])
                ->setType($webstores['type'])
                ->setName($webstores['name'])
                ->setPluginSetId($webstores['pluginSetId'])
                ->setConfiguration($this->parseConfiguration($webstores['configuration']));


    }

    public static function map(array $webstores, ?WebStores $target = null): WebStores
    {
        $mapper = new self();
        return $mapper($webstores, $target);
    }

    public static function mapAll(array $webstores, ?WebStores $target = null): array
    {
        $mapper = new self();
        $result = [];
        foreach ($webstores as $webstore) {
            $result[] = $mapper($webstore, $target);
        }
        return $result;
    }

    private function parseConfiguration($configuration)
    {
        return json_decode($configuration, true);
    }

}