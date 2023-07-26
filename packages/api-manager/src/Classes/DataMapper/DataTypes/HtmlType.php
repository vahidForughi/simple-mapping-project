<?php

namespace ApiManager\Classes\DataMapper\DataTypes;

class HtmlType implements DataTypesInterface
{
    static public function convert($value) {
        return trim(strip_tags($value));
    }
}
