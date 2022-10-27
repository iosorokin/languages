<?php

namespace Modules\Core\Languages\Application\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Modules\Core\Languages\Application\Presenters\Mixins\CreateLanguage;
use Modules\Core\Languages\Infrastructure\Model\Language;

class AdminCreateLanguage
{
    public function __construct(
        private GetAuthUser            $getClient,
        private LanguageAuthorizeAdmin $authorize,
        private CreateLanguage         $createLanguage,
    ) {}

    public function __invoke(array $attributes): Language
    {
        $auth = ($this->getClient)();
        $this->authorize->canCreate($auth);
        $language = ($this->createLanguage)($auth, $attributes);

        return $language;
    }
}
