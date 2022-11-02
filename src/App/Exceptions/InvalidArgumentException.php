<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

final class InvalidArgumentException extends Exception
{
    public function __construct(string $argument, string $message)
    {
        throw ValidationException::withMessages([
            $argument => $message,
        ]);
    }
}
