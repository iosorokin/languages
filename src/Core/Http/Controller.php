<?php

namespace Core\Http;

use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

abstract class Controller
{
    public function client(): Client
    {
        $getClient = app()->make(GetClientPresenter::class);

        return $getClient();
    }
}
