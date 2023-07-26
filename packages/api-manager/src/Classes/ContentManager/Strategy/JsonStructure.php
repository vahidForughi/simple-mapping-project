<?php

namespace ApiManager\Classes\ContentManager\Strategy;

class JsonStructure extends ContentStructure implements ContentStructureInterface
{
    public function extractData($content)
    {
        $jsonContent = json_decode($content);
        if ($this->isSuccess($jsonContent) && $this->hasData($jsonContent))
            return $jsonContent->data;
        else
            return null;
    }

    private function isSuccess($content): bool
    {
        return property_exists($content, 'status') && $content->status == 'OK';
    }

    private function hasData($content): bool {
        return property_exists($content, 'data');
    }
}
