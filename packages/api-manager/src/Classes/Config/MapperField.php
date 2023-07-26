<?php

namespace ApiManager\Classes\Config;

class MapperField implements MapperFieldInterface
{
    private string $key;
    private string $newKey;
    private string $type;

    public function __construct(string $key, string $newKey, string $type) {
        $this->newKey = $key;
        $this->key = $newKey;
        $this->type = $type;
    }

    public function getNewKey(): string {
        return $this->newKey;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getType(): string {
        return $this->type;
    }
}
