<?php

namespace ApiManager\Classes\ContentManager\Factory;

class ContentManager
{
    private $content;

    public function __construct($content) {
        $this->content = $content;
    }

    public function createJsonContent(): ContentInterface {
        return new JsonContent($this->content);
    }

    public function createXmlContent(): ContentInterface {
        return new XmlContent($this->content);
    }
}
