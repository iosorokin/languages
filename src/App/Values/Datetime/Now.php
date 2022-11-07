<?php

declare(strict_types=1);

namespace App\Values\Datetime;

final class Now extends BaseTimestamp
{
    public static function new(): self
    {
        return new self(now());
    }
}
