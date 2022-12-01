<?php

declare(strict_types=1);

namespace Core\Exceptions;

use Exception;

final class ValidationException extends Exception
{
    public function __construct(
        private array $data
    ) {
        $message = implode('|', $this->data);

        parent::__construct($message);
    }
}
