<?php

namespace ApiManager\Exceptions;

class ApiFetchException extends Exception
{
    public function context(): array
    {
        return ['ApiFetch' => 'has not any cotent'];
    }
}

