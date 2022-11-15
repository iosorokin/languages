<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Controll\Command;

final class StudentCreateSource
{
    public function __construct(
        private int $student,
        private int $language,
        private string $title,
        private string $description,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            student: $attributes['student'],
            language: $attributes['language'],
            title: $attributes['title'],
            description: $attributes['description'],
        );
    }

    public function student(): int
    {
        return $this->student;
    }

    public function language(): int
    {
        return $this->language;
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
