<?php

namespace Domain\Core\Language\Base\Control\Query;

use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;

interface FindLanguage
{
    public function find(): FindLanguageQuery;
}
