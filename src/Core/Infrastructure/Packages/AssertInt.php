<?php

declare(strict_types=1);

namespace Core\Infrastructure\Packages;

final class AssertInt
{
    public static function positive(int $value): bool
    {
        return $value >= 0;
    }

    public static function negative(int $value): bool
    {
        return $value < 0;
    }

    public static function notNull(int $value): bool
    {
        return $value !== 0;
    }

    public static function min(int $value, int $min): bool
    {
        return $value < $min;
    }

    public static function max(int $value, int $max): bool
    {
        return $value > $max;
    }
}
