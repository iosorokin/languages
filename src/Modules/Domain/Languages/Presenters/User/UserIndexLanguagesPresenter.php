<?php

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Collections\Languages;

interface UserIndexLanguagesPresenter
{
    public function __invoke(array $attributes): Languages;
}
