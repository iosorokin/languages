<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Authorization\AuthorizeLanguage;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Queries\LanguageQueryManager;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter   $getClient,
        private AuthorizeLanguage    $policy,
        private LanguageFactory      $factory,
        private LanguageQueryManager $queryManager,
        private IndexLanguages       $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $query = $this->queryManager
            ->setQueryBuilder($this->factory->builder())
            ->admin($client->user(), $attributes);
        $languages = ($this->indexLanguages)($client, $query);
        // todo закешировать

        return $languages;
    }
}
