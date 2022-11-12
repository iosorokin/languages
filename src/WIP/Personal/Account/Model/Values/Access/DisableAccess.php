<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Values\Access;

final class DisableAccess extends BaseAccess
{
    public static function new(): self
    {
        return new self(false);
    }
}
