<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validator;

final class Errors
{
    private array $errors;

    public function addError(Error $error): self
    {
        $this->errors[] = $error;

        return $this;
    }

    public function hasErrors(): bool
    {
        return ! empty($this->errors);
    }
}
