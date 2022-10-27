<?php

declare(strict_types=1);

namespace App\Values\Text;

final class Title
{
    private string $title;

    public function __construct(mixed $title)
    {
        $this->title = $title;
    }

    public function value(): string
    {
        return $this->title;
    }
}
