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
                ->extractWithStrategy(new JsonStructure()) // or ->extractWithFactory('json')
                ->mapping(new TeamsMappingStrategy())
                ->getData();
<<<<<<< HEAD
=======
            DB::beginTransaction();
>>>>>>> b251af4 (some comment and document)

            // db transaction for save data to database
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
                ->extractWithStrategy(new XmlStructure()) // or ->extractWithFactory('xml')
                ->mapping(new TeamsMappingStrategy())
                ->getData();

            // db transaction for save data to database
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
