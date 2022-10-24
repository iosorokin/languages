<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactoryManager;
use Modules\Domain\Languages\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Queries\LanguageQueryManager;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private LanguageFactoryManager $factory,
        private LanguageQueryManager   $queryManager,
        private IndexLanguages         $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $query = $this->queryManager
            ->setQueryBuilder($this->factory->builder())
            ->guest($attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
