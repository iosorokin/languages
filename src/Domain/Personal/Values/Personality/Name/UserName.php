<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality\Name;

use App\Values\InvalidValueObject;

final class UserName implements Name
{
    private function __construct(
        private readonly string $value,
    ) {}

    public static function new(string $name): self|InvalidValueObject
    {
        $name = new self($name);
        $errors = $name->validate();

        return empty($errors) ? $name : InvalidName::new($errors);
    }

    public function compare(Name $name): bool
    {
        return $this->get() === $name->get();
    }

    private function validate(): array
    {
        return [];
    }

    public function get(): mixed
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
