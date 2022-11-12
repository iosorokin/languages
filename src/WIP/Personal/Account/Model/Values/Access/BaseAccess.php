<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Values\Access;

abstract class BaseAccess implements Access
{
    protected function __construct(
        protected bool $enable
    ) {}

    public function compare(Access $access): bool
    {
        return $this->isEnable() === $access->isEnable();
    }

    public function isEnable(): bool
    {
        return $this->enable;
    }

    public function isDisable(): bool
    {
        return ! $this->enable;
    }

    public function toBool(): bool
    {
        return $this->enable;
    }
}
