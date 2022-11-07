<?php

namespace Domain\Core\Languages\Application\Presenters\Admin;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Domain\Core\Languages\Application\Presenters\Mixins\IndexLanguages;
use Domain\Core\Languages\Application\Queries\LanguageQueryBuilder;
use Domain\Core\Languages\Domain\Collections\Languages;

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
