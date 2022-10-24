<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Presenters\Mixins\UpdateLanguage;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
