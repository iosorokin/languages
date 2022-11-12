<?php

declare(strict_types=1);

namespace App\Model\Values;

use App\Exceptions\InvalidArgumentException;

abstract class BaseInvalidValueObject implements InvalidValueObject
{
    public function __construct(
        private array $errors,
    ) {}

    public static function new(array $errors): static
    {
        return new static($errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function compare($name): bool
    {
        $this->get();
    }

    public function __toString(): string
    {
        $this->get();
    }

    public function toArray(): array
    {
        $this->get();
    }

    public function toInt(): int
    {
        $this->get();
    }

    public function get(): never
    {
        throw new InvalidArgumentException('', serialize($this->errors));
    }
}
