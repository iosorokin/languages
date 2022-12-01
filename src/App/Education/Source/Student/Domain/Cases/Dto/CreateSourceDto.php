<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Cases\Dto;

final class CreateSourceDto
{
    public function __construct(
        public readonly int    $studentId,
        public readonly int $languageId,
        public readonly string $title,
        public readonly string $description,
        public readonly string $type,
    ) {}
}
