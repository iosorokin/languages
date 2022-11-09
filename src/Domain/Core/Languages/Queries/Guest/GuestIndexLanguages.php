<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Queries\Guest;

use Domain\Core\Languages\Actions\Mixins\IndexLanguages;
use Domain\Core\Languages\Model\Collections\Languages;
use Domain\Core\Languages\Queries\LanguageQueryBuilder;

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
