<?php

namespace ApiManager\Facades;

use ApiManager\Classes\ApiManager as BaseApiManager;
use Illuminate\Support\Facades\Facade;

/**
 * Fecade for ApiManager\Classes\ApiManager
 *
 * @method static ApiManager\Classes\ApiManager init(string $name)
 * @method static ApiManager\Classes\ApiManager fetch()
 * @method static ApiManager\Classes\ApiManager setContent($content)
 * @method static ApiManager\Classes\ApiManager extractWithStrategy(ApiManager\Classes\ContentManager\Strategy\ContentStructureInterface $contentStructure)
 * @method static ApiManager\Classes\ApiManager extractWithFactory(string $type)
 * @method static ApiManager\Classes\ApiManager mapping(ApiManager\Classes\DataMapper\MappingStrategyInterface $mappingStrategy)
 * @method static ApiManager\Classes\ApiManager getData()
 *
 */
class ApiManager extends Facade
{
    protected static function getFacadeAccessor() {
        return BaseApiManager::class;
    }
}
