<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Test;

use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;

final class LanguageUserCaseTestHelper
{
    public static function getFindDto(string $value): FindLanguageDto
    {
        return new FindLanguageDto($value);
    }

    public static function getQueryDto(string $search = '', string $sort = ''): GetLanguagesDto
    {
        return new GetLanguagesDto($search, $sort);
    }
}
