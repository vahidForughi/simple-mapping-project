<?php

namespace App\Http\Controllers;

use ApiManager

class TeamController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function sync(Request $request)
    {
        // TODO: We should fetch and mapping an api
        $apiManager = ApiManager::init()
                        ->fetch();
        dd($apiManager);
    }
}
