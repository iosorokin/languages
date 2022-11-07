<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters\User;

use Domain\Core\Sources\Presenters\Guest\GuestShowSource;
use Domain\Core\Sources\Structures\Source;

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
