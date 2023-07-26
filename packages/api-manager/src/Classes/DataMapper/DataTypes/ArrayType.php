<?php

namespace ApiManager\Classes\DataMapper\DataTypes;

class ArrayType implements DataTypesInterface
{
    static public function convert($value) {
        return json_encode($value);
    }
}
