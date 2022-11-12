<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Control\Queries;

use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Core\Language\Guest\Support\GuestGetLanguageOrFail;

class GuestFindLanguageHandler
{
    public function __construct(
        private GuestGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(GuestFindLanguage $query): GuestLanguage
    {
        $language = ($this->getLanguageOrFail)($query);

        return $language;
    }
}
