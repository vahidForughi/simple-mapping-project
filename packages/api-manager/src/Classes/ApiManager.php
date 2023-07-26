<?php

namespace ApiManager\Classes;

use ApiManager\Classes\Config\ApiConfigInterface;
use ApiManager\Classes\Config\YamlConfig;
use ApiManager\Classes\DataMapper\DataMapper;
use ApiManager\Classes\DataMapper\MappingStrategyInterface;
use ApiManager\Classes\traits\FactoryContentExtractor;
use ApiManager\Classes\traits\StrategyContentExtractor;
use ApiManager\Exceptions\ApiFetchException;
use Illuminate\Support\Facades\Http;

class ApiManager
{
    use StrategyContentExtractor, FactoryContentExtractor;

    private ApiConfigInterface $config;
    private $content;
    private $data;

    public function init(string $name): self {
        $this->config = new YamlConfig($name);

        return $this;
    }

    /**
     *
     * fetch yaml config url
     *
     * @return $this
     * @throws ApiFetchException
     */
    public function fetch(): self {
        $response = Http::get($this->config->getApiUrl());
        if ($response->ok() && ($response->body() <> ''))
            $this->setContent($response->body());
        else
            throw new ApiFetchException;

        return $this;
    }

    /**
     *
     * set content property
     *
     * @param $content
     * @return $this
     */
    public function setContent($content): self {
        $this->content = $content;

        return $this;
    }

    /**
     *
     * mapping data with mapping strategy
     *
     * @param MappingStrategyInterface $mappingStrategy
     * @return $this
     */
    public function mapping(MappingStrategyInterface $mappingStrategy): self {
        $mapper = new DataMapper($mappingStrategy);
        $this->data = $mapper->mapping($this->data, $this->config->getFields());

        return $this;
    }

    /**
     *
     * get data
     *
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }
}
