<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Base\Structure\Identify\HasIntId;

final class Cast
{
    public static function idToInt(HasIntId|int $value): int
    {
        return is_int($value) ? $value : $value->getId();
    }
}
