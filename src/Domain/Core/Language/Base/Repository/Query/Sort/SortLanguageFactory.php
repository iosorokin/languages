<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository\Query\Sort;

final class SortLanguageFactory
{
    public static function new(string $sort): SortLanguage
    {
        return match (true) {
            default => new LanguageNullSort(),
        };
    }
}
