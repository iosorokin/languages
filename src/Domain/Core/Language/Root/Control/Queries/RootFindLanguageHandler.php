<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\ContentManager;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Support\RootGetLanguageOrFail;

class RootFindLanguageHandler
{
    public function __construct(
        private RootGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, RootFindLanguage $query): RootLanguage
    {
        $language = ($this->getLanguageOrFail)($query->id());

        return $language;
    }
}
