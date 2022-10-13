<?php

declare(strict_types=1);

namespace App\Base\Structures\Timestamps;

use Illuminate\Support\Carbon;

trait EntityTimestamps
{
    use Timestamps;

    private Carbon $createdAt;

    private Carbon $updatedAt;
}