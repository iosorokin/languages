<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Queries\LanguageQuery;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private IndexLanguages $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $query = new LanguageQuery();
        $languages = ($this->indexLanguages)($client, $attributes);

        return $languages;
    }
}
