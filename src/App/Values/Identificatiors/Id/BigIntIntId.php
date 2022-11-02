<?php

declare(strict_types=1);

namespace App\Values\Identificatiors\Id;

use App\Values\InvalidValueObject;

final class BigIntIntId implements IntId
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
}
