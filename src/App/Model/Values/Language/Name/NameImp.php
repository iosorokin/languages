<?php

declare(strict_types=1);

namespace App\Model\Values\Language\Name;

final class NameImp implements Name
{
    private function __construct(
        private string $name,
    ) {}

    public static function new(string $name): Name
    {
        return new self($name);
    }

    public function get(): string
    {
        return $this->name;
    }

    public function compare(Name $name): bool
    {
        return $this->get() === $name->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
