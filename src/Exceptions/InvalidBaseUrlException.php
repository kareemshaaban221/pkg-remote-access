<?php

namespace Kareem\Http\Exceptions;

use Exception;

class InvalidBaseUrlException extends Exception
{
    public function __construct(string $message = '[RemoteAccessService] Invalid Http Base Url')
    {
        parent::__construct($message);
    }
}
