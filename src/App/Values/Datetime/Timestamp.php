<?php

namespace App\Values\Datetime;

use Illuminate\Support\Carbon;

interface Timestamp
{
    public function value(): Carbon;
}
