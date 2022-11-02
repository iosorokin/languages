<?php

namespace App\Values\Datetime;

use App\Values\ValueObject;
use Illuminate\Support\Carbon;

interface Timestamp extends ValueObject
{
    public function get(): Carbon;
}
