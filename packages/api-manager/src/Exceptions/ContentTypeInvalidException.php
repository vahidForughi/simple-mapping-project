<?php

namespace ApiManager\Exceptions;

class ContentTypeInvalidException extends Exception
{
    public function context(): array
    {
        return ['ContentTypeInvalid' => 'content type invalid'];
    }
}

