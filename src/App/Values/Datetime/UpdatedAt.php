<?php

declare(strict_types=1);

namespace App\Values\Datetime;

use Illuminate\Support\Carbon;

final class UpdatedAt
{
    private Carbon $updatedAt;

    public function __construct(string|Carbon $updatedAt)
    {
        if (is_string($updatedAt)) $updatedAt = Carbon::make($updatedAt);

        $this->updatedAt = $updatedAt;
    }

    public function value(): Carbon|string
    {
        return $this->updatedAt;
    }
}
