<?php

namespace App\Http\Controllers;

use ApiManager;
use ApiManager\Classes\ContentManager\JsonStructure;
use ApiManager\Classes\ContentManager\XmlStructure;

class TeamController extends Controller
{
    /**
     * Teams sync from api.
     */
    public function sync()
    {
        // TODO: We should fetch and mapping an api
        $teams = ApiManager::init('teams')
                        ->fetch()
                        ->extract(new JsonStructure())
                        ->getData();
        dd($teams);
    }

    /**
     * Teams sync from xml api.
     */
    public function xmlSync()
    {
        // TODO: We should fetch and mapping an api
        $teams = ApiManager::init('teams-xml')
            ->fetch()
            ->extract(new XmlStructure())
            ->getData();
        dd($teams);
    }
}
