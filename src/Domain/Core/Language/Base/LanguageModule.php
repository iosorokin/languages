<?php

namespace Domain\Core\Language\Base;

use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Collection\LanguageCollection;

interface LanguageModule
{
    public function find(FindLanguage $query): ?Language;

    public function findOrFail(FindLanguage $query): Language;

    public function get(GetLanguages $query): LanguageCollection;
}
