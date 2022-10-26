<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Languages\Presenters\Mixins\CreateLanguage;

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
