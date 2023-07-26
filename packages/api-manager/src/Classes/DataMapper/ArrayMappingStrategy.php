<?php

namespace ApiManager\Classes\DataMapper;

use ApiManager\Classes\DataMapper\DataTypes\DataType;

class ArrayMappingStrategy extends MappingStrategy implements MappingStrategyInterface
{

    public function mapping($data, $fields = []) {
        return array_map(function($item) use ($fields) {
            $array = [];
            foreach ($fields as $field) {
                $array[$field->getNewKey()] = isset($item->{$field->getKey()}) ? DataType::convert($field->getType() ,$item->{$field->getKey()}) : null;
            }
            return $array;
        }, $data);
    }

}
