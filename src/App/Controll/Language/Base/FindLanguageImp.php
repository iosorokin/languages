<?php

declare(strict_types=1);

namespace App\Controll\Language\Base;

use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;

final class FindLanguageImp implements FindLanguage
{
    private FindLanguageQuery $find;

    public function __construct(string $value)
    {
        $this->find = new FindByCode($value);
    }

    public function find(): FindLanguageQuery
    {
        return $this->find;
    }
}
