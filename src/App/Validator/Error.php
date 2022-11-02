<?php

declare(strict_types=1);

namespace App\Validator;

final class Error
{
    public function __construct(
        public readonly string $code,
        public readonly mixed $expected,
        public readonly mixed $actual,
        public readonly array $options,
    ) {}
}
