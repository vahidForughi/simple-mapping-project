<?php

namespace ApiManager\Classes\traits;

use ApiManager\Classes\ContentManager\Strategy\ContentManager;
use ApiManager\Classes\ContentManager\Strategy\ContentStructureInterface;
use ApiManager\Exceptions\DataNotFoundException;

trait StrategyContentExtractor
{

    public function extractWithStrategy(ContentStructureInterface $contentStructure) {
        $contentManager = new ContentManager($this->content, $contentStructure);
        $data = $contentManager->extractData();

        if (!$data)
            throw new DataNotFoundException;

        $this->data = $data;

        return $this;
    }

}
