<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Datetime;

use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Carbon;

final class TimestampImp extends BaseTimestamp
{
    public static function new(string|Carbon $timestamp): Timestamp
    {
        try {
            $timestamp = is_string($timestamp) ? Carbon::make($timestamp) : $timestamp;
        } catch (InvalidFormatException $e) {
            return InvalidTimestamp::new([
                'timestamp.invalid_format'
            ]);
        }

        return new self($timestamp);
    }
}
