<?php

namespace App\Classes;

use ApiManager\Classes\DataMapper\ArrayMappingStrategy;
use App\Models\Team;

class TeamsMappingStrategy extends ArrayMappingStrategy
{
    public function mapping($data, $fields = []) {
        $mappedData = parent::mapping($data, $fields);

        return array_map(fn ($team) => new Team($team) ,$mappedData);
    }
}
