<?php

namespace ApiManager\Classes\Config;

interface ApiConfigInterface
{
    public function getApiUrl(): string;
    public function getFields(): array;
}
