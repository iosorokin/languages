<?php

declare(strict_types=1);

namespace App\Model\Values\Datetime;

use Carbon\Carbon;

abstract class BaseTimestamp implements Timestamp
{
    protected function __construct(
        protected Carbon $timestamp
    ) {
        $this->timestamp = now();
    }

    public function get(): Carbon
    {
        return $this->timestamp;
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
