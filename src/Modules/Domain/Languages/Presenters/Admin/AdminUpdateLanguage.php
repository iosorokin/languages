<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\UpdateLanguage;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminUpdateLanguage implements AdminUpdateLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private UpdateLanguage $updateLanguage,
    ) {}

    public function __invoke(int $languageId, array $attributes): void
    {
        $client = ($this->getClient)();
        ($this->updateLanguage)($client, $languageId, $attributes);
    }
}
