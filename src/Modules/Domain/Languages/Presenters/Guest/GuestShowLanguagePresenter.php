<?php

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Structures\Language;

interface GuestShowLanguagePresenter
{
    public function __invoke(int $id): Language;
}