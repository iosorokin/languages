<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

final class InvalidValueObjectStateException extends Exception
{
    public function __construct()
    {
        $message = 'Invalid state of the value object';

        parent::__construct($message);
    }
}
