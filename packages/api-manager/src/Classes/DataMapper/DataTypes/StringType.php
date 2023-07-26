<?php

namespace ApiManager\Classes\DataMapper\DataTypes;

class StringType implements DataTypesInterface
{
    static public function convert($value) {
        return $value;
    }
}
