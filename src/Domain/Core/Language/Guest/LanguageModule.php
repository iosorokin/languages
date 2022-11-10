<?php

namespace Domain\Core\Language\Guest;

use Domain\Core\Language\Guest\Control\Queries\FindLanguage;
use Domain\Core\Language\Guest\Control\Queries\GetLanguages;
use Domain\Core\Language\Guest\Model\Aggregate\Language;
use Domain\Core\Language\Guest\Model\Collection\Languages;

interface LanguageModule
{
    public function find(FindLanguage $query): Language;

    public function get(GetLanguages $query): Languages;
}
