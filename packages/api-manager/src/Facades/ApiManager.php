<?php

namespace ApiManager\Facades;

use ApiManager\Classes\ApiManager as BaseApiManager;
use Illuminate\Support\Facades\Facade;

class ApiManager extends Facade
{
    protected static function getFacadeAccessor() {
        return BaseApiManager::class;
    }
}
