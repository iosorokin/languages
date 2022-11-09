<?php

declare(strict_types=1);

namespace App\Values\Language\Code;

final class CodeImp implements Code
{
    private function __construct(
        private string $code,
    ) {}

    public static function new(string $name): Code
    {
        return new self($name);
    }

    public function get(): string
    {
        return $this->code;
    }

    public function compare(Code $code): bool
    {
        return $this->get() === $code->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
