<?php

namespace Domain\Core\Languages\Actions\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Actions\Mixins\UpdateLanguage;
use Domain\Core\Languages\Queries\GetLanguage;

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
