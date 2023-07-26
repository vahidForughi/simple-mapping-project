<?php

namespace ApiManager\Classes\ContentManager;

class ContentManager
{
    protected $content;
    private ContentStructureInterface $contentStructure;

    public function __construct($content, ContentStructureInterface $contentStructure) {
        $this->content = $content;
        $this->contentStructure = $contentStructure;
    }

    public function extractData() {
        return $this->contentStructure->extractData($this->content);
    }

}
