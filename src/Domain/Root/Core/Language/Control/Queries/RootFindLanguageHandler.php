<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Control\Queries;

use App\Model\Roles\Root;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Support\RootGetLanguageOrFail;

class RootFindLanguageHandler
{
    public function __construct(
        private RootGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, RootFindLanguage $query): RootLanguage
    {
        $language = ($this->getLanguageOrFail)($query);

        return $language;
    }
}
