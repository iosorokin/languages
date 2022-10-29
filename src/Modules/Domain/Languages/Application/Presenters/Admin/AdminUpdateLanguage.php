<?php

namespace Modules\Domain\Languages\Application\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Domain\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Application\Presenters\Mixins\UpdateLanguage;

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
