<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters\User;

use Domain\Sources\Presenters\Guest\GuestShowSource;
use Domain\Sources\Structures\Source;

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
