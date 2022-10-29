<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Guest;

use Modules\Domain\Languages\Application\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Application\Queries\LanguageQueryBuilder;
use Modules\Domain\Languages\Domain\Collections\Languages;

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
