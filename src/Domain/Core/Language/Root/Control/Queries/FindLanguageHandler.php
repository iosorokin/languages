<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\ContentManager;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class FindLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, FindLanguage $query): Language
    {
        $language = ($this->getLanguageOrFail)($query->id());

        return $language;
    }
}
