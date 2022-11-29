<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Datetime;

use Core\Base\Model\Values\BaseInvalidValueObject;

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
