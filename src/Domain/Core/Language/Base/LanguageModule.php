<?php

namespace Domain\Core\Language\Base;

use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;

interface LanguageModule
{
    public function find(FindLanguage $query): ?ReadonlyLanguage;

    public function findOrFail(FindLanguage $query): ReadonlyLanguage;

    public function get(GetLanguages $query): ReadonlyLanguageCollection;
}
