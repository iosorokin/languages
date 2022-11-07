<?php

namespace Domain\Core\Languages\Application\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Domain\Core\Languages\Application\Presenters\Mixins\UpdateLanguage;

class AdminUpdateLanguage
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private GetLanguage    $getLanguage,
        private UpdateLanguage $updateLanguage,
    ) {}

    public function __invoke(int $languageId, array $attributes): void
    {
        $auth = ($this->getAuthUser)();
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        ($this->updateLanguage)($auth, $language, $attributes);
    }
}
