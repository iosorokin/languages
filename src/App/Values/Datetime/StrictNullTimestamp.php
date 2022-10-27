<?php

declare(strict_types=1);

namespace App\Values\Datetime;

use Exception;
use Illuminate\Support\Carbon;

final class StrictNullTimestamp implements Timestamp
{
    public function value(): never
    {
        throw new Exception('The null timestamp cannot be called. First, set a specific timestamp');
    }
}
