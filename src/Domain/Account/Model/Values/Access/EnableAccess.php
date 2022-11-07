<?php

declare(strict_types=1);

namespace Domain\Account\Model\Values\Access;

final class EnableAccess extends BaseAccess
{
    public static function new(): self
    {
        return new self(true);
    }
}
