<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Personal\Auth\Contexts\Client;

interface AdminIndexLanguagesPresenter
{
    public function __invoke(array $attributes): Languages;
}
