<?php

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Contexts\Client;

interface GetClientPresenter
{
    public function __invoke(): Client;
}
