<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository\Query\Search;

final class SearchLanguageFactory
{
    public static function new(string $search): SearchLanguage
    {
        return match (true) {
            self::isName($search) => new SearchByName($search),
            default => new LanguageNullSearch(),
        };
    }

    private static function isName(string $search): bool
    {
        return LanguageSearchEnum::Name->value === $search;
    }
}
