<?php

namespace ApiManager\Classes\Config;

use Symfony\Component\Yaml\Yaml;

class YamlConfig implements ApiConfigInterface
{
    private string $name;
    private string $api_url = 'https://';
    private string $data_key = 'data';
    private array $properties = [];

    public function __construct(string $name) {
        $this->name = $name;
        $config = Yaml::parseFile(config_path('mappers\\'.$this->name.'.yml'))['config'];
        $this->api_url = $config['api_url'];
        $this->data_key = $config['data_key'];
        $this->properties = $config['properties'];
    }

    public function getApiUrl(): string {
        return $this->api_url;
    }

    public function getDataKey(): string {
        return $this->data_key;
    }

    public function getProperties(): array {
        return $this->properties;
    }
}
