<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Queries\LanguageQueryBuilder;

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
