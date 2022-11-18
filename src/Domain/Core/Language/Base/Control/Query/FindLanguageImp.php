<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Control\Query;

use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguageFactory;

final class FindLanguageImp implements FindLanguage
{
    private FindLanguageQuery $find;

    private function __construct(string $find)
    {
        $this->find = FindLanguageFactory::new($find);
    }

    public function find(): FindLanguageQuery
    {
        return $this->find;
    }
}
