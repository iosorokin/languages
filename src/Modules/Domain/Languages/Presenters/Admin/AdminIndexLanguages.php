<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Illuminate\Contracts\Pagination\CursorPaginator;
use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Filters\LanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private IndexLanguages $indexLanguages,
    ) {}

    public function __invoke(Client $client, array $attributes): Languages
    {
        $client = ($this->getClient)();
        $languages = ($this->indexLanguages)($client, $attributes);

        return $languages;
    }
}
