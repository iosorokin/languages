<?php

namespace Modules\Domain\Languages\Application\Presenters\Admin;

use Modules\Domain\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Application\Presenters\Mixins\CreateLanguage;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Personal\App\Services\AuthService;

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
