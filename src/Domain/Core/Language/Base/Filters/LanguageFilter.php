<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Filters;

use Domain\Core\Language\Base\Filters\Name\NameFilter;

final class LanguageFilter
{
    public function __construct(
        private NameFilter $nameFilter,
    ) {}
}
