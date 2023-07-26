<?php

namespace ApiManager\Classes;

use ApiManager\Classes\Config\ApiConfigInterface;
use ApiManager\Classes\Config\YamlConfig;
use ApiManager\Classes\ContentManager\ContentManager;
use ApiManager\Classes\ContentManager\ContentStructureInterface;
use ApiManager\Classes\DataMapper\DataMapper;
use ApiManager\Classes\DataMapper\MappingStrategyInterface;
use ApiManager\Exceptions\ApiFetchException;
use ApiManager\Exceptions\DataNotFoundException;
use Illuminate\Support\Facades\Http;

class ApiManager
{
    private ApiConfigInterface $config;
    private $content;
    private $data;

    public function init(string $name): self {
        $this->config = new YamlConfig($name);

        return $this;
    }

    public function fetch(): self {
        $response = Http::get($this->config->getApiUrl());
        if ($response->ok() && ($response->body() <> ''))
            $this->setContent($response->body());
        else
            throw new ApiFetchException;

        return $this;
    }

    public function setContent($content): self {
        $this->content = $content;

        return $this;
    }

    public function extract(ContentStructureInterface $contentStructure) {
        $contentManager = new ContentManager($this->content, $contentStructure);
        $data = $contentManager->extractData();

        if (!$data)
            throw new DataNotFoundException;

        $this->data = $data;

        return $this;
    }

    public function mapping(MappingStrategyInterface $mappingStrategy): self {
        $mapper = new DataMapper($mappingStrategy);
        $this->data = $mapper->mapping($this->data, $this->config->getProperties());

        return $this;
    }

    public function getData() {
        return $this->data;
    }
}
