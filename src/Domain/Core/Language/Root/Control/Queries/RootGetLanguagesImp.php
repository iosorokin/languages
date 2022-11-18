<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Control\Query\GetLanguagesImp;
use Domain\Core\Language\Base\Repository\Query\Search\SearchLanguage;
use Domain\Core\Language\Base\Repository\Query\Sort\SortLanguage;

final class RootGetLanguagesImp implements RootGetLanguages
{
    public function __construct(
        private Root $root,
        private GetLanguagesImp $getLanguages
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function search(): SearchLanguage
    {
        return $this->getLanguages->search();
    }

    public function sort(): SortLanguage
    {
        return $this->getLanguages->sort();
    }
}
