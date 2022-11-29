<?php

declare(strict_types=1);

namespace Core\Infrastructure\Packages;

final class AssertStr
{
    public static function min(string $value, int $min): bool
    {
        return strlen($value) < $min;
    }

    public static function max(string $value, int $max): bool
    {
        return strlen($value) > $max;
    }
}
