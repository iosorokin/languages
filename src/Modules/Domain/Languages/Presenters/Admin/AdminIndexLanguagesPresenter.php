<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Personal\Auth\Contexts\Client;

interface AdminIndexLanguagesPresenter
{
    public function __invoke(Client $client, array $attributes): Languages;
}
