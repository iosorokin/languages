<?php

declare(strict_types=1);

namespace Infrastructure\Database\Structures\Source;

use Carbon\Carbon;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;
use Domain\Core\Source\Base\Repository\Structure\SourceStructure;

final class SourceStructureImp implements SourceStructure
{
    private function __construct(
        private int $id,
        private LanguageStructure $language,
        private int $student,
        private string $title,
        private string $description,
        private string $type,
        private Carbon $createdAt,
    ) {}

    public static function createFromArray(LanguageStructure $language, array $attributes): self
    {
        return new self(
            id: $attributes['id'],
            language: $language,
            student: $attributes['student'],
            title: $attributes['title'],
            description: $attributes['description'],
            type: $attributes['type'],
            createdAt: $attributes['created_at'],
        );
    }

    public function id(): int
    {
        return $this->id;
    }

    public function language(): LanguageStructure
    {
        return $this->language;
    }

    public function student(): int
    {
        return $this->student;
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

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
