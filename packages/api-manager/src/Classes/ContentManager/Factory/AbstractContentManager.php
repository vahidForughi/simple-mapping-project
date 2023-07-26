<?php

namespace ApiManager\Classes\ContentManager\Factory;

abstract class AbstractContentManager
{
    abstract public function createJsonContent(): ContentInterface;

    abstract public function createXmlContent(): ContentInterface;
}
