<?php

namespace Domain\Core\Languages\Actions\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Authorization\LanguageAuthorizeAdmin;
use Domain\Core\Languages\Model\Collections\Languages;
use Domain\Core\Languages\Actions\Mixins\IndexLanguages;
use Domain\Core\Languages\Queries\LanguageQueryBuilder;

class AdminIndexLanguages
{
    public function __construct(
        private GetAuthUser            $getAuthUser,
        private LanguageAuthorizeAdmin $authorize,
        private LanguageQueryBuilder   $queryManager,
        private IndexLanguages         $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $auth = ($this->getAuthUser)();
        $this->authorize->canIndex($auth);
        $query = $this->queryManager->admin($auth, $attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
