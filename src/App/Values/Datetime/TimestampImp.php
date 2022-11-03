<?php

declare(strict_types=1);

namespace App\Values\Datetime;

use Illuminate\Support\Carbon;

final class TimestampImp implements Timestamp
{
    private Carbon $timestamp;

    public function __construct(string|Carbon $timestamp)
    {
        if (is_string($timestamp)) $timestamp = Carbon::make($timestamp);

        $this->timestamp = $timestamp;
    }

    public static function new(string|Carbon $timestamp): Timestamp
    {
        return new self($timestamp);
    }

    public function get(): Carbon
    {
        return $this->timestamp;
    }
}
