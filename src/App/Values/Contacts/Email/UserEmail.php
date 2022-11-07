<?php

declare(strict_types=1);

namespace App\Values\Contacts\Email;

final class UserEmail implements Email
{
    private function __construct(
        private readonly string $value
    ) {}

    public static function new(string $email): Email
    {
        $email = new static($email);
        $errors = $email->validate();

        return empty($errors) ? $email : InvalidEmailObject::new($errors);
    }

    private function validate(): array
    {
        return [];
    }

    public function compare(Email $email): bool
    {
        return $this->get() === $email->get();
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
