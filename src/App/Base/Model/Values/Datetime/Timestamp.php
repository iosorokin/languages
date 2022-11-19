<?php

namespace App\Base\Model\Values\Datetime;

use App\Base\Model\Values\ValueObject;
use Carbon\Carbon;

interface Timestamp extends ValueObject
{
    public function get(): Carbon;

    public function toISOString(): string;

    public function toDateTimeString(): string;
}
