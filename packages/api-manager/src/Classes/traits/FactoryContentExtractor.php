<?php

namespace ApiManager\Classes\traits;

use ApiManager\Classes\ContentManager\Factory\ContentManager;
use ApiManager\Exceptions\ContentTypeInvalidException;
use ApiManager\Exceptions\DataNotFoundException;

trait FactoryContentExtractor
{

    public function extractWithFactory($type) {
        $contentManager = new ContentManager($this->content);

        // create a new content object due to the $type
        switch ($type) {
            case 'json':
                $contentObject = $contentManager->createJsonContent();
                break;
            case 'xml':
                $contentObject = $contentManager->createXmlContent();
                break;
            default:
                $contentObject = null;
                break;
        }

        if (!$contentObject)
            throw new ContentTypeInvalidException;

        // extract data from the created content
        $data = $contentObject->extractData();

        if (!$data)
            throw new DataNotFoundException;

        $this->data = $data;

        return $this;
    }

}
