<?php

declare(strict_types=1);

namespace App\Values\Datetime;

use Illuminate\Support\Carbon;

final class PresetCreatedAt implements Timestamp
{
    private Carbon $createdAt;

    public function __construct(string|Carbon $createdAt)
    {
        if (is_string($createdAt)) $createdAt = Carbon::make($createdAt);

        $this->createdAt = $createdAt;
    }

    public function value(): Carbon
    {
        return $this->createdAt;
    }
}
