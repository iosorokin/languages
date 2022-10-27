<?php

declare(strict_types=1);

namespace App\Values\Identificatiors;

final class BigIntIntId implements IntId
{
    private int $id;

    public function __construct(mixed $id)
    {
        $this->id = $id;
    }

    public function value(): int
    {
        return $this->id;
    }
}
