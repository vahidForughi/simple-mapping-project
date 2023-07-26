<?php

namespace ApiManager\Classes\Config;

interface MapperFieldInterface
{
    public function getKey();
    public function getNewKey();
    public function getType();
}
