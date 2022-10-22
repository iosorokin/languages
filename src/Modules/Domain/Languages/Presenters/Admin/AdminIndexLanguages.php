<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Queries\LanguageQueryManager;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter     $getClient,
        private LanguageAuthorizeAdmin $authorize,
        private LanguageFactory        $factory,
        private LanguageQueryManager   $queryManager,
        private IndexLanguages         $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $this->authorize->canIndex($client);
        $query = $this->queryManager
            ->setQueryBuilder($this->factory->builder())
            ->admin($client->user(), $attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
