<?php

namespace ApiManager\Classes\ContentManager\Factory;

class Content
{
    protected $content;
    protected $data;

    public function __construct($content) {
        $this->setContent($content);
    }

    protected function setContent($content) {
        $this->content = $content;
    }

    public function getData() {
        return $this->data;
    }
}
