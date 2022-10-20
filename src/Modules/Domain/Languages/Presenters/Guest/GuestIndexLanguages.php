<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private IndexLanguages     $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $client = ($this->getClient)();
        $languages = ($this->indexLanguages)($client, $attributes);
        // todo закешировать

        return $languages;
    }
}
