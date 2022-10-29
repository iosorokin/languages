<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Domain\Languages\Application\Presenters\Mixins\IndexLanguages;
use Modules\Domain\Languages\Application\Queries\LanguageQueryBuilder;
use Modules\Domain\Languages\Domain\Collections\Languages;

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