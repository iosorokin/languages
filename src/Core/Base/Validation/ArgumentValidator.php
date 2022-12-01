<?php

declare(strict_types=1);

namespace Core\Base\Validation;

use Core\Exceptions\InvalidArgumentException;
use Core\Infrastructure\Packages\AssertInt;
use Illuminate\Support\Facades\Config;

final class ArgumentValidator
{
    public function __construct(
        private string $name,
        private mixed $value
    ) {}

    public function isInt(): self
    {
        if (AssertInt::isInt($this->value)) {
            $code = Config::get('codes.integer.not_int');
            $this->throwException($code);
        }

        return $this;
    }

    private function throwException(string $code): never
    {
        throw new InvalidArgumentException($this->name, $code);
    }
}
