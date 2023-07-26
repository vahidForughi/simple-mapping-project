<?php

namespace ApiManager\Exceptions;

class DataNotFoundException extends Exception
{
    public function context(): array
    {
        return ['DataNotFound' => 'not found any data in content'];
    }
}

