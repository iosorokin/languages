<?php

namespace App\Education\Language\Base;

use App\Education\Language\Base\Control\Query\FindLanguage;
use App\Education\Language\Base\Control\Query\GetLanguages;
use App\Education\Language\Base\Model\Aggregate\Language;
use App\Education\Language\Base\Model\Collection\LanguageCollection;

interface LanguageModule
{
    public function find(FindLanguage $query): ?Language;

    public function findOrFail(FindLanguage $query): Language;

    public function get(GetLanguages $query): LanguageCollection;
}
