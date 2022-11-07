<?php

declare(strict_types=1);

namespace Domain\Account\Model\Values\Password;
use App\Values\InvalidValueObject;
use App\Values\Security\Password;
use Infrastructure\Packages\StrAssert;

final class RawPassword implements Password
{
    private function __construct(
        private readonly string $value
    ) {}

    private static function validate(string $value): array
    {
        if (StrAssert::min($value, 8)) {
            $errors = ['str.min.8'];
        }

        if (StrAssert::max($value, 255)) {
            $errors = ['str.max.8'];
        }

        return $errors ?? [];
    }

    public static function new(string $value): self|InvalidValueObject
    {
        $errors = static::validate($value);
        if (! empty($errors)) {
            return new InvalidPasswordObject($errors);
        }

        return new static($value);
    }

    public static function newBcryptHashed(string $value): BcryptHashedPassword|InvalidValueObject
    {
        $rawPassword = static::new($value);
        if ($rawPassword instanceof InvalidValueObject) {
            return $rawPassword;
        }

        return BcryptHashedPassword::new($rawPassword);
    }

    public function get(): string
    {
        return $this->value;
    }

    public function check(Password $password): bool
    {
        return $this->value === $password->get();
    }

    public function compare(Password $password): bool
    {
        return $this->get() === $password->get();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
