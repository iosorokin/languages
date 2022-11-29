<?php

declare(strict_types=1);

namespace App\Education\Language\Base\Repository\Query\Search;

final class LanguageNullSearch implements SearchLanguage
{
    public function value(): string
    {
        return '';
    }

    public function __toString()
    {
        return $this->value();
    }
}
