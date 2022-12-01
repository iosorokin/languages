<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Factories;

use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Infrastructure\Database\Structure\SourceStructure;

final class RestoreSourceFactory
{
    public static function fromStructure(SourceStructure $structure): Source
    {
        return new Source(
            id: $structure->id,
            studentId: $structure->studentId,
            languageId: $structure->languageId,
            title: $structure->title,
            description: $structure->description,
            type: $structure->type,
            createdAt: $structure->createdAt,
        );
    }
}
