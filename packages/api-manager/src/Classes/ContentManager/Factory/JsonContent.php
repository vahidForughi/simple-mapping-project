<?php

namespace ApiManager\Classes\ContentManager\Factory;

class JsonContent extends Content implements ContentInterface
{
    public function extractData()
    {
        if ($this->isSuccess() && $this->hasData())
            return $this->data = $this->content->data;
        else
            return null;
    }

    protected function setContent($content) {
        $this->content = json_decode($content);
    }

    private function isSuccess(): bool
    {
        return property_exists($this->content, 'status') && $this->content->status == 'OK';
    }

    private function hasData(): bool {
        return property_exists($this->content, 'data');
    }
}
