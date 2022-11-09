<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

final class EntityNotFound extends Exception
{
    public function __construct(string $key, int|string $value)
    {
        $message = sprintf(
            'Id %s with value %s not found',
            $key,
            $value,
        );

        parent::__construct($message);
    }
}
