<?php

namespace ApiManager\Classes\ContentManager;

class XmlStructure extends ContentStructure implements ContentStructureInterface
{
    public function extractData($content) {
        $xmlContent = simplexml_load_string($content);
        if ($this->isSuccess($xmlContent) && $this->hasData($xmlContent))
            return json_decode(json_encode($xmlContent->data))->item;
        else
            return null;
    }

    private function isSuccess($content): bool {
        return property_exists($content->attributes(), 'status') && $content['status'] == 'OK';
    }

    private function hasData($content): bool {
        return property_exists($content, 'data');
    }
}
