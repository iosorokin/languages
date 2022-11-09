<?php

declare(strict_types=1);

namespace App\Base\Helpers;

abstract class ModuleHelper extends Helper
{
    public static function new(): static
    {
        return app(static::class);
    }
}
