<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository\Query\Search;

final class LanguageNullSearch implements SearchLanguage
{
    public function get(): string
    {
        return '';
    }

    public function __toString()
    {
        return $this->get();
    }
}
