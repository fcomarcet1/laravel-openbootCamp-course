<?php

namespace App\Exceptions\Http;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HttpForbiddenException extends Exception
{
    public function __construct(string $message = null, \Throwable $previous = null)
    {
        parent::__construct(Response::HTTP_FORBIDDEN, $message, $previous);
    }
}
