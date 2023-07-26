<?php

namespace ApiManager\Classes\Config;

use Symfony\Component\Yaml\Yaml;

class YamlConfig implements ApiConfigInterface
{
    private string $name;
    private string $api_url = 'https://';
    private array $fields;

    public function __construct(string $name) {
        $this->name = $name;
        $config = Yaml::parseFile(config_path('mappers\\'.$this->name.'.yml'))['config'];
        $this->api_url = $config['api_url'];
        $this->setFields($config['fields']);
    }

    public function setFields(array $fields) {
        $this->fields = [];
        foreach ($fields as $key => $field) {
            $this->fields[] = new MapperField($field['key'], $key, $field['type']);
        }
    }

    public function getApiUrl(): string {
        return $this->api_url;
    }

    public function getFields(): array {
        return $this->fields;
    }
}
