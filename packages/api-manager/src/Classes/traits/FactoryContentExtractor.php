<?php

namespace ApiManager\Classes\traits;

use ApiManager\Classes\ContentManager\Factory\ContentManager;
use ApiManager\Exceptions\DataNotFoundException;

trait FactoryContentExtractor
{

    public function extractWithFactory($type) {
        $contentManager = new ContentManager($this->content);

        switch ($type) {
            case 'json':
                $data = ($contentManager->createJsonContent())->extractData();
                break;
            case 'xml':
                $data = ($contentManager->createXmlContent())->extractData();
                break;
            default:
                $data = null;
                break;
        }

        if (!$data)
            throw new DataNotFoundException;

        $this->data = $data;

        return $this;
    }

}
