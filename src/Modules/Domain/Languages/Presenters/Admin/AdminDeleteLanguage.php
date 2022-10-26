<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Presenters\Mixins\DeleteLanguage;

class AdminDeleteLanguage
{
    public function __construct(
        private GetAuthUser $getAuthUser,
        private GetLanguage $getLanguage,
        private LanguageAuthorizeAdmin $authorize,
        private DeleteLanguage $deleteLanguage,
    ) {}

    public function __invoke(int $languageId): void
    {
        $auth = ($this->getAuthUser)();
        $language = $this->getLanguage->getOrThrowNotFound($languageId);
        $this->authorize->canDelete($auth, $language);
        ($this->deleteLanguage)($language);
    }
}
