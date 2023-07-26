<?php

namespace ApiManager\Classes\DataMapper\DataTypes;

class DateType implements DataTypesInterface
{
    static public function convert($value) {
        return date('Y-m-d', strtotime($value));
    }
}
