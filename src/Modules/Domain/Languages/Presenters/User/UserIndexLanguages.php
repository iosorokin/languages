<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguagesPresenter;

final class UserIndexLanguages implements UserIndexLanguagesPresenter
{
    public function __construct(
        private GuestIndexLanguagesPresenter $guestIndexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        return ($this->guestIndexLanguages)($attributes);
    }
}
