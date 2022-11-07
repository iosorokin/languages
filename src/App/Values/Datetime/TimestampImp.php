<?php

declare(strict_types=1);

namespace App\Values\Datetime;

use Illuminate\Support\Carbon;

final class TimestampImp extends BaseTimestamp
{
    public static function new(string|Carbon $timestamp): Timestamp
    {
        return new self($timestamp);
    }
}
