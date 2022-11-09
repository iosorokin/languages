<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Values\Access;

final class DisableAccess extends BaseAccess
{
    public static function new(): self
    {
        return new self(false);
    }
}
