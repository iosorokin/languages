<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Actions\ShowSource;
use Modules\Domain\Sources\Presenters\Guest\GuestShowSourcePresenter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserShowSource implements UserShowSourcePresenter
{
    public function __construct(
        private GuestShowSourcePresenter $guestShowSource,
    ) {}

    public function __invoke(int $sourceId): Source
    {
        return ($this->guestShowSource)($sourceId);
    }
}
