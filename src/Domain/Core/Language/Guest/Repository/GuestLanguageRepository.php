<?php

namespace Domain\Core\Language\Guest\Repository;

use Domain\Core\Language\Guest\Control\Queries\GuestFindLanguage;
use Domain\Core\Language\Guest\Control\Queries\GuestGetLanguages;
use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Core\Language\Guest\Model\Collection\GuestLanguages;

interface GuestLanguageRepository
{
    public function find(GuestFindLanguage $query): ?GuestLanguage;

    public function get(GuestGetLanguages $query): GuestLanguages;
}
