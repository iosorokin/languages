<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Queries\LanguageQueryManager;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private LanguageFactory    $factory,
        private LanguageQueryManager $queryManager,
        private IndexLanguages     $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $query = $this->queryManager
            ->setQueryBuilder($this->factory->builder())
            ->guest($attributes);
        $languages = ($this->indexLanguages)($client, $query);
        // todo закешировать

        return $languages;
    }
}
