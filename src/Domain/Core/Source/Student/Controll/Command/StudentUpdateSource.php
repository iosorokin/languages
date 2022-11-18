<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Controll\Command;

final class StudentUpdateSource
{
    public function __construct(
        private string $title,
        private string $description,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            title: $attributes['title'],
            description: $attributes['description']
        );
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }
}
