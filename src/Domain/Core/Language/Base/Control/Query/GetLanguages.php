<?php

namespace Domain\Core\Language\Base\Control\Query;

use Domain\Core\Language\Base\Repository\Query\Search\SearchLanguage;
use Domain\Core\Language\Base\Repository\Query\Sort\SortLanguage;

interface GetLanguages
{
    public function search(): SearchLanguage;

    public function sort(): SortLanguage;
}
