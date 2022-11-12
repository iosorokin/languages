<?php

declare(strict_types=1);

namespace App\Model\Values\Datetime;

use App\Model\Values\BaseInvalidValueObject;

final class InvalidTimestamp extends BaseInvalidValueObject implements Timestamp
{
    public function toDateTimeString(): string
    {
        $this->get();
    }

    public function toISOString(): string
    {
        $this->get();
    }
}
