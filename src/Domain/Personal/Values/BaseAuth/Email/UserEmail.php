<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth\Email;

use App\Values\Contacts\Email;
use App\Values\Contacts\InvalidEmailObject;
use App\Values\InvalidValueObject;
use App\Values\ValueObject;
use Illuminate\Support\Facades\Validator;

final class UserEmail implements Email
{
    private function __construct(
        private readonly string $value
    ) {}

    public static function new(string $email): self| InvalidValueObject
    {
        $email = new static($email);
        $errors = $email->validate();

        return empty($errors) ? $email : InvalidEmailObject::new($errors);
    }

    private function validate(): array
    {
        return [];
    }

    public function compare(ValueObject $ov): bool
    {
        return $this->get() === $ov->get();
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
