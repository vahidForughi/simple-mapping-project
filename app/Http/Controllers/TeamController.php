<?php

namespace App\Http\Controllers;

use ApiManager\Classes\ContentManager\Strategy\JsonStructure;
use ApiManager\Classes\ContentManager\Strategy\XmlStructure;
use App\Classes\TeamsMappingStrategy;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use ApiManager;

class TeamController extends Controller
{
    /**
     * Teams sync from api.
     */
    public function sync()
    {
        try {
            $teams = ApiManager::init('teams')
                ->fetch()   // you can setContent instead
                ->extractWithStrategy(new JsonStructure())
                // ->extractWithFactory('json')
                ->mapping(new TeamsMappingStrategy())
                ->getData();
<<<<<<< Updated upstream
            dd($teams[0]);
=======

>>>>>>> Stashed changes
            DB::beginTransaction();

            foreach ($teams as $team) {
                Team::updateOrCreate($team->toArray());
                // $team->save();
            }

            DB::commit();

            return 'successful';
        }
        catch(\Exception $e) {
            DB::rollBack();

            return 'failed';
        }
    }

    /**
     * Teams sync from xml api.
     */
    public function xmlSync()
    {
        try {
            $teams = ApiManager::init('teams-xml')
                ->fetch()
                ->extractWithStrategy(new XmlStructure())
                ->mapping(new TeamsMappingStrategy())
                ->getData();

            DB::beginTransaction();

            foreach ($teams as $team) {
                Team::updateOrCreate($team->toArray());
                // $team->save();
            }

            DB::commit();

            return 'successful';
        }
        catch(\Exception $e) {
            DB::rollBack();

            return 'failed';
        }
    }
}
