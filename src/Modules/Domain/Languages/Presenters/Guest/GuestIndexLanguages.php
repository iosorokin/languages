<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageQueryFactory;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private LanguageQueryFactory $queryFactory,
        private IndexLanguages     $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $query = $this->queryFactory->user($attributes);
        $languages = ($this->indexLanguages)($client, $query);
        // todo закешировать

        return $languages;
    }
}
