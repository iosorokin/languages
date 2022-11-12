<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\User;

use WIP\Core\Sources\Presenters\Guest\GuestShowSource;
use WIP\Core\Sources\Structures\Source;

final class UserShowSource
{
    public function __construct(
        private GuestShowSource $guestShowSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        return ($this->guestShowSource)($sourceId);
    }
}
