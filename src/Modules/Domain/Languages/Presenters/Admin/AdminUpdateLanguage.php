<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Presenters\Mixins\UpdateLanguage;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminUpdateLanguage implements AdminUpdateLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private GetLanguagePresenter $getLanguage,
        private UpdateLanguage $updateLanguage,
    ) {}

    public function __invoke(int $languageId, array $attributes): void
    {
        $client = ($this->getClient)();
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        ($this->updateLanguage)($client, $language, $attributes);
    }
}
