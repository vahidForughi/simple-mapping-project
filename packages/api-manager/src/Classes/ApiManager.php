<?php

namespace ApiManager\Classes;

use ApiManager\Classes\Config\ApiConfigInterface;
use ApiManager\Classes\Config\YamlConfig;
use ApiManager\Exceptions\ApiFetchException;
use Illuminate\Support\Facades\Http;

class ApiManager
{
    private ApiConfigInterface $config;
    private object $content;

    public function init(string $name): self {
        $this->config = new YamlConfig($name);

        return $this;
    }

    public function fetch(): self {
        $response = Http::get($this->config->getApiUrl());
        if ($response->ok() && ($response->body() <> ''))
            $this->setContent($response->object());
        else
            throw new ApiFetchException;

        return $this;
    }

    public function setContent(object $content): self {
        $this->content = $content;

        return $this;
    }

}
