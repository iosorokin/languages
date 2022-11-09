<?php

declare(strict_types=1);

namespace App\Values\Language\NativeName;

final class NativeNameImp implements NativeName
{
    private function __construct(
        private string $code,
    ) {}

    public static function new(string $code): NativeName
    {
        return new self($code);
    }

    public function get(): string
    {
        return $this->code;
    }

    public function compare(NativeName $nativeName): bool
    {
        return $this->get() === $nativeName->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
