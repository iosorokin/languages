<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters\User;

use Domain\Sources\Presenters\Guest\GuestIndexSources;

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
