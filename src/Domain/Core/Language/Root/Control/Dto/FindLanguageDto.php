<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Dto;

use Domain\Core\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;

final class FindLanguageDto
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
