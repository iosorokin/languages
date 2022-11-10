<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Queries\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;
use Domain\Core\Languages\Commands\Mixins\IndexLanguages;
use Domain\Core\Languages\Queries\LanguageQueryBuilder;

final class UserIndexLanguages
{
    public function __construct(
        private GetAuthUser          $getAuthUser,
        private LanguageQueryBuilder $queryManager,
        private IndexLanguages       $indexLanguages,
    ) {}

    public function __invoke(array $attributes): RootLanguages
    {
        $auth = ($this->getAuthUser)();
        $query = $this->queryManager->user($auth, $attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
