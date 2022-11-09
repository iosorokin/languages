<?php

declare(strict_types=1);

namespace App\Values\Description;

final class DescriptionImp implements Description
{
    private function __construct(
        private string $description
    ) {}

    public static function new(string $description): self
    {
        return new self($description);
    }

    public function compare(Description $description): bool
    {
        return $this->get() === $description->get();
    }

    public function get(): string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
