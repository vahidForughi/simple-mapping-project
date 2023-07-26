<?php

namespace ApiManager\Classes\DataMapper\DataTypes;

class DataType
{
    static public function convert($type, $value) {
        switch ($type) {
            case 'array':
                return ArrayType::convert($value);
            case 'string':
                return StringType::convert($value);
            case 'date':
                return DateType::convert($value);
            case 'html':
                return HtmlType::convert($value);
            default:
                return $value;
        }
    }
}
