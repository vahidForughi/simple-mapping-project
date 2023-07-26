<?php

namespace ApiManager\Classes\DataMapper;

class DataMapper
{
    protected MappingStrategyInterface $mappingStrategy;

    public function __construct(MappingStrategyInterface $mappingStrategy) {
        $this->mappingStrategy = $mappingStrategy;
    }

    public function mapping($data, $fields = []) {
        return $this->mappingStrategy->mapping($data, $fields);
    }

}
