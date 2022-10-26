<?php

declare(strict_types=1);

namespace Modules\Personal\Values;

final class Name
{
    public function __construct(
        private string $name,
    ) {}

    public function value(): string
    {
        return $this->name;
    }
}
