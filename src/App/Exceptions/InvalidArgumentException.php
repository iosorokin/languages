<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

final class InvalidArgumentException extends Exception
{
    private string $argument;

    private string $error;

    public function __construct(string $argument, string $error)
    {
        $this->argument = $argument;
        $this->error = $error;

        parent::__construct($error);
    }
}
