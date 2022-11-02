<?php

namespace Domain\Languages\Application\Presenters\Admin;

use Infrastructure\Services\Auth\AuthService;
use Domain\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Domain\Languages\Application\Presenters\Mixins\CreateLanguage;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
