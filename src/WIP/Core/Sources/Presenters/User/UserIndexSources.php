<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\User;

use WIP\Core\Sources\Presenters\Guest\GuestIndexSources;

final class UserIndexSources
{
    public function __construct(
        private GuestIndexSources $guestIndexSources,
    ) {}

    public function __invoke(array $attributes)
    {
        return ($this->guestIndexSources)($attributes);
    }
}
