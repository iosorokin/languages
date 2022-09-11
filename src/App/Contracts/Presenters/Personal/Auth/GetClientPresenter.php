<?php

namespace App\Contracts\Presenters\Personal\Auth;

use App\Contracts\Contexts\Client;

interface GetClientPresenter
{
    public function __invoke(): Client;
}
