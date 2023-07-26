<?php

namespace ApiManager\Classes\ContentManager\Factory;

class XmlContent extends Content implements ContentInterface
{
    public function extractData()
    {
        if ($this->isSuccess() && $this->hasData())
            return $this->data = json_decode(json_encode($this->content->data))->item;
        else
            return null;
    }

    protected function setContent($content) {
        $this->content = simplexml_load_string($content);
    }

    private function isSuccess(): bool
    {
        return property_exists($this->content->attributes(), 'status') && $this->content['status'] == 'OK';
    }

    private function hasData(): bool {
        return property_exists($this->content, 'data');
    }
}
