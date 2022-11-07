<?php

namespace Domain\Core\Languages\Application\Presenters\Admin;

use Domain\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Domain\Core\Languages\Application\Presenters\Mixins\CreateLanguage;
use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Infrastructure\Services\Auth\AuthService;

class AdminCreateLanguage
{
    public function __construct(
        private AuthService            $getClient,
        private LanguageAuthorizeAdmin $authorize,
        private CreateLanguage         $createLanguage,
    ) {}

    public function __invoke(array $attributes): LanguageModel
    {
        $auth = ($this->getClient)();
        $this->authorize->canCreate($auth);
        $language = ($this->createLanguage)($auth, $attributes);

        return $language;
    }
}
