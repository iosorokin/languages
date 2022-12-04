<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository\Query\Sort;

final class LanguageNullSort implements SortLanguage
{
    public function get(): string
    {
        return '';
    }
}
