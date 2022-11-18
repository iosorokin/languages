<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository\Query\Find;

use App\Base\Repository\Query\FindByNotAllowed;

final class FindLanguageFactory
{
    public static function new(string $find): FindLanguage
    {
        return match (true) {
            self::isCode($find) => new FindByCode($find),
            default => throw new FindByNotAllowed($find),
        };
    }

    public static function isCode(string $find): bool
    {
        return FindLanguageEnum::Code->value === $find;
    }
}
