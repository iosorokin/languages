<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Services\LanguageQueryManager;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserIndexLanguages implements UserIndexLanguagesPresenter
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
            ->user($client->user(), $attributes);
        $languages = ($this->indexLanguages)($client, $query);
        // todo закешировать

        return $languages;
    }
}
