<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Presenters\Guest\GuestIndexSourcesPresenter;

final class UserIndexSources implements UserIndexSourcesPresenter
{
    public function __construct(
        private GuestIndexSourcesPresenter $guestIndexSources,
    ) {}

    public function __invoke(array $attributes)
    {
        return ($this->guestIndexSources)($attributes);
    }
}
