<?php

declare(strict_types=1);

namespace App\Model\Values\Identificatiors\Id;

use App\Model\Values\InvalidValueObject;

final class BigIntId implements IntId
{
    private function __construct(
        private int $id
    ) {}

    public static function new(int $id): self|InvalidValueObject
    {
        $errors = static::validate();
        if ($errors) {
            return InvalidObjectIntId::new($errors);
        }

        return new self($id);
    }

    private static function validate(): array
    {
        return [];
    }

    public function get(): mixed
    {
        return $this->id;
    }

    public function toInt(): int
    {
        return (int) $this->get();
    }

    public function compare(IntId $id): bool
    {
        return $this->toInt() === $id->toInt();
    }
}
