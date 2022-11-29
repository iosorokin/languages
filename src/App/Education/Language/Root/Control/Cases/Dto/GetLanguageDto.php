<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Control\Cases\Dto;

use App\Education\Language\Base\Repository\Query\Find\FindByCode;
use App\Education\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;

final class GetLanguageDto
{
    private FindLanguageQuery $find;

    public function __construct(
        string $value
    ) {
        $this->find = new FindByCode($value);
    }

    public function find(): FindLanguageQuery
    {
        return $this->find;
    }
}
