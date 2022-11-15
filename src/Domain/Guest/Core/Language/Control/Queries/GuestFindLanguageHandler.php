<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Control\Queries;

use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Guest\Core\Language\Support\GuestGetLanguageOrFail;

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
