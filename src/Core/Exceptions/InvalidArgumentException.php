<?php

declare(strict_types=1);

namespace Core\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

final class InvalidArgumentException extends Exception
{
    public function __construct(
        private string $source,
        private string $error
    ) {
        $message = sprintf("%s: %s", $this->source, $this->error);

        parent::__construct($message);
    }
}
