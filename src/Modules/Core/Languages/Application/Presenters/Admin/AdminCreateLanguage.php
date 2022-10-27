<?php

namespace Modules\Core\Languages\Application\Presenters\Admin;

use Modules\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Modules\Core\Languages\Application\Presenters\Mixins\CreateLanguage;
use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
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
