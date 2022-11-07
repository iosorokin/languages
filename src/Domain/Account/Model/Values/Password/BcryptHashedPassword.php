<?php

declare(strict_types=1);

namespace Domain\Account\Model\Values\Password;

use App\Values\InvalidValueObject;
use App\Values\Security\Password;
use Illuminate\Hashing\BcryptHasher;

final class BcryptHashedPassword implements Password
{
    public function __construct(
        private string $value,
    ) {}

    public static function new(RawPassword $password): self|InvalidValueObject
    {
        $hasher = new BcryptHasher();
        $hashedPassword = $hasher->make($password);
        $password = new self($hashedPassword);

        return $password;
    }

    public static function restore(string $password): self
    {
        $password = new self($password);

        return $password;
    }

    public function check(Password $password): bool
    {
        $hasher = new BcryptHasher();

        return $hasher->check($password->get(), $this->value);
    }

    public function get(): string
    {
        return $this->value;
    }

    public function compare(Password $password): bool
    {
        return $this->get() === $password->get();
    }

    public function __toString()
    {
        return $this->get();
    }
}
