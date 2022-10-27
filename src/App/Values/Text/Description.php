<?php

declare(strict_types=1);

namespace App\Values\Text;

final class Description
{
    private string $description;

    public function __construct(mixed $description)
    {
        $this->description = $description;
    }

    public function value(): string
    {
        return $this->description;
    }
}
