<?php

declare(strict_types=1);

namespace Core\Test\Helpers;

abstract class AppHelper extends Helper
{
    public static function new(): static
    {
        return app(static::class);
    }
}
