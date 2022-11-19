<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Test;

use App\Controll\Language\Base\FindLanguageImp;
use App\Controll\Language\Base\GetLanguagesImp;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Control\Query\GetLanguages;

final class LanguageUserCaseTestHelper
{
    public static function getFindQuery(string $value): FindLanguage
    {
        return new FindLanguageImp($value);
    }

    public static function getQuery(string $search = '', string $sort = ''): GetLanguages
    {
        return new GetLanguagesImp($search, $sort);
    }
}
