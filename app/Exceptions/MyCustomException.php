<?php

namespace App\Exceptions;

use Exception;

class MyCustomException extends Exception
{
    protected $_message;
    protected $_code;
    protected $_data;

    public function __construct($message = null, $code = 0, $data = null, \Throwable $previous = null)
    {
        $this->_message = $message;
        $this->_code = $code;
        $this->_data = $data;
    }



}
