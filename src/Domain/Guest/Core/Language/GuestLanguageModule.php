<?php

namespace Domain\Guest\Core\Language;

use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguage;
use Domain\Guest\Core\Language\Control\Queries\GuestGetLanguages;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Guest\Core\Language\Model\Collection\GuestLanguages;

interface GuestLanguageModule
{
    public function find(GuestFindLanguage $query): GuestLanguage;

    public function get(GuestGetLanguages $query): GuestLanguages;
}
