<?php

declare(strict_types=1);

namespace App\Model\Values\Datetime;

use Carbon\Carbon;

abstract class BaseTimestamp implements Timestamp
{
    protected function __construct(
        protected Carbon $timestamp
    ) {}

    public function get(): Carbon
    {
        return $this->timestamp;
    }

    public function compare(Timestamp $timestamp): bool
    {
        return $this->toISOString() === $timestamp->toISOString();
    }

    public function toISOString(): string
    {
        return $this->timestamp->toISOString();
    }

    public function toDateTimeString(): string
    {
        return $this->timestamp->toDateTimeString();
    }
}
