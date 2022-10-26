<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Queries\LanguageQueryBuilder;

final class UserIndexLanguages
{
    public function __construct(
        private GetAuthUser          $getAuthUser,
        private LanguageQueryBuilder $queryManager,
        private IndexLanguages       $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $auth = ($this->getAuthUser)();
        $query = $this->queryManager->user($auth, $attributes);
        $languages = ($this->indexLanguages)($query);
        // todo закешировать

        return $languages;
    }
}
