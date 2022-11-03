<?php

declare(strict_types=1);

namespace App\Values\Personality\Name;

use Infrastructure\Packages\StrAssert;

final class NameImp implements Name
{
    private function __construct(
        private readonly string $value,
    ) {}

    public static function new(string $name): Name
    {
        $vo = new self($name);
        $errors = $vo->validate();

        return empty($errors) ? $vo : new InvalidName($errors);
    }

    public function compare(Name $name): bool
    {
        return $this->get() === $name->get();
    }

    public function validate(): array
    {
        if (StrAssert::min($this->value, 2)) {
            $errors = ['error'];
        }

        if (StrAssert::max($this->value, 255)) {
            $errors = ['error'];
        }

        return $errors ?? [];
    }

    public function get(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
