<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Controll\Command;

final class CreateSourceImp implements CreateSource
{
    public function __construct(
        private int $student,
        private int $language,
        private string $title,
        private string $description,
        private string $type,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            student: $attributes['student'],
            language: $attributes['language'],
            title: $attributes['title'],
            description: $attributes['description'],
            type: $attributes['type'],
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

    public function type(): string
    {
        return $this->type;
    }
}
