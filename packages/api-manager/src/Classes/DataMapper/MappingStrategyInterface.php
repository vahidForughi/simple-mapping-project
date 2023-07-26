<?php

namespace ApiManager\Classes\DataMapper;

interface MappingStrategyInterface
{
    public function mapping($data, $fields);
}
