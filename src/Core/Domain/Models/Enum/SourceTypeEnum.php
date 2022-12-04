<?php

declare(strict_types=1);

namespace Core\Domain\Models\Enum;

enum SourceTypeEnum: string
{
    case Movie = 'movie';

    case Song = 'song';

    public static function castCases(): array
    {
        return [
            self::Movie->value,
            self::Song->value,
        ];
    }
}
