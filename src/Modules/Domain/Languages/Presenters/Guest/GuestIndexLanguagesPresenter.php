<?php

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Collections\Languages;

interface GuestIndexLanguagesPresenter
{
    public function __invoke(array $attributes): Languages;
}
