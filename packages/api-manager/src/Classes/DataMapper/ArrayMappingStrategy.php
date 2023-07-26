<?php

namespace ApiManager\Classes\DataMapper;

use Illuminate\Support\Str;

class ArrayMappingStrategy extends MappingStrategy implements MappingStrategyInterface
{
    private $dataTypesDir = "ApiManager\Classes\DataMapper\DataTypes\\";

    public function mapping($data, $options = []) {
        return array_map(function($item) use ($options) {
            $array = [];

            foreach ($options as $key => $option) {
                $dataType = $this->dataTypesDir.Str::studly($option['type'].'-type');

                $array[$option['key']] = isset($item->{$key}) ? $dataType::convert($item->{$key}) : null;
            }
            return $array;
        }, $data);
    }

}
