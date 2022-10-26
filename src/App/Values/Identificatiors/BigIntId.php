<?php

declare(strict_types=1);

namespace App\Values\Identificatiors;

final class BigIntId
{
    public function __construct(
        private int $id
    ) {}

    public function value(): int
    {
        return $this->id;
    }
}
