<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\DeleteLanguage;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminDeleteLanguage implements AdminDeleteLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private DeleteLanguage $deleteLanguage,
    ) {}

    public function __invoke(int $languageId): void
    {
        $client = ($this->getClient)();
        ($this->deleteLanguage)($client, $languageId);
    }
}
