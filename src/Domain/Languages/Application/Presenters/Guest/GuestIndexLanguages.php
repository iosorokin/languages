<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\Guest;

use Domain\Languages\Application\Presenters\Mixins\IndexLanguages;
use Domain\Languages\Application\Queries\LanguageQueryBuilder;
use Domain\Languages\Domain\Collections\Languages;

final class GuestIndexLanguages
{
    public function __construct(
        private LanguageQueryBuilder $queryManager,
        private IndexLanguages       $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $query = $this->queryManager
            ->guest($attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
