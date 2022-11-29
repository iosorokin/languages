<?php

declare(strict_types=1);

namespace App\Education\Language\Base\Test;

use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;

final class LanguageUserCaseTestHelper
{
    public static function getFindDto(string $value): GetLanguageDto
    {
        return new GetLanguageDto($value);
    }

    public static function getQueryDto(string $search = '', string $sort = ''): GetLanguagesDto
    {
        return new GetLanguagesDto($search, $sort);
    }
}
