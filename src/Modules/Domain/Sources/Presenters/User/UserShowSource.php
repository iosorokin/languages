<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Presenters\Guest\GuestShowSource;
use Modules\Domain\Sources\Structures\Source;

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
