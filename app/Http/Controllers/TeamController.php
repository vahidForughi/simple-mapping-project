<?php

namespace App\Http\Controllers;

use ApiManager;
use ApiManager\Classes\ContentManager\JsonStructure;
use ApiManager\Classes\ContentManager\XmlStructure;
use App\Classes\TeamsMappingStrategy;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

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
                ->extract(new JsonStructure())
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

    /**
     * Teams sync from xml api.
     */
    public function xmlSync()
    {
        try {
            $teams = ApiManager::init('teams-xml')
                ->fetch()
                ->extract(new XmlStructure())
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
