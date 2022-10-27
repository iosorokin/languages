<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\User;

use Modules\Core\Sources\Presenters\Guest\GuestShowSource;
use Modules\Core\Sources\Structures\Source;

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
