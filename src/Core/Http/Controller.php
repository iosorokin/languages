<?php

namespace Core\Http;

use App\Contracts\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

abstract class Controller
{
    public function client(): Client
    {
        $getClient = app()->make(GetClientPresenter::class);

        return $getClient();
    }
}
