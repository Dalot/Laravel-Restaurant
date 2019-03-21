<?php

namespace App\Exceptions;

use Exception;

class ProductCreateErrorException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Error in Creating Product');
    }
}