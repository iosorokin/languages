<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Control\Cases\Dto;

use Domain\Education\Language\Base\Control\Query\GetLanguages;
use Domain\Education\Language\Base\Repository\Query\Search\SearchLanguage;
use Domain\Education\Language\Base\Repository\Query\Search\SearchLanguageFactory;
use Domain\Education\Language\Base\Repository\Query\Sort\SortLanguage;
use Domain\Education\Language\Base\Repository\Query\Sort\SortLanguageFactory;

final class GetLanguagesDto implements GetLanguages
{
    private SearchLanguage $search;
    private SortLanguage   $sort;

    public function __construct(string $search = '', string $sort = '')
    {
        $this->search = SearchLanguageFactory::new($search);
        $this->sort = SortLanguageFactory::new($sort);
    }

    public function search(): SearchLanguage
    {
        return $this->search;
    }

    public function sort(): SortLanguage
    {
        return $this->sort;
    }
}
