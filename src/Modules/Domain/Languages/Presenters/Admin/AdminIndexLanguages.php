<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Queries\LanguageQueryBuilder;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
