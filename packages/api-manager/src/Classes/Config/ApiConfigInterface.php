<?php

namespace ApiManager\Classes\Config;

interface ApiConfigInterface
{
    public function getApiUrl(): string;
    public function getDataKey(): string;
    public function getProperties(): array;
}
