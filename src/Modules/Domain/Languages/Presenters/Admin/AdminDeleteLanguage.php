<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Presenters\Mixins\DeleteLanguage;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminDeleteLanguage implements AdminDeleteLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private GetLanguagePresenter $getLanguage,
        private LanguageAuthorizeAdmin $authorize,
        private DeleteLanguage $deleteLanguage,
    ) {}

    public function __invoke(int $languageId): void
    {
        $client = ($this->getClient)();
        $language = $this->getLanguage->getOrThrowNotFound($languageId);
        $this->authorize->canDelete($client, $language);
        ($this->deleteLanguage)($language);
    }
}
