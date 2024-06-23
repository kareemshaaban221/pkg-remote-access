<?php

namespace Kareem\Http\Exceptions;

use Exception;

class InvalidHeadersException extends Exception
{
    public function __construct(string $message = '[RemoteAccessService] Invalid Http Headers')
    {
        parent::__construct($message);
    }
}
