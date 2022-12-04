<?php

namespace Domain\Education\Language\Base;

use Domain\Education\Language\Base\Control\Query\FindLanguage;
use Domain\Education\Language\Base\Control\Query\GetLanguages;
use Domain\Education\Language\Base\Model\Aggregate\Language;
use Domain\Education\Language\Base\Model\Collection\LanguageCollection;

interface LanguageModule
{
    public function find(FindLanguage $query): ?Language;

    public function findOrFail(FindLanguage $query): Language;

    public function get(GetLanguages $query): LanguageCollection;
}
