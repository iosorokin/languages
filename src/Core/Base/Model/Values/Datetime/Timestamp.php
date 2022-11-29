<?php

namespace Core\Base\Model\Values\Datetime;

use Core\Base\Model\Values\ValueObject;
use Carbon\Carbon;

interface Timestamp extends ValueObject
{
    public function get(): Carbon;

    public function toISOString(): string;

    public function toDateTimeString(): string;
}
