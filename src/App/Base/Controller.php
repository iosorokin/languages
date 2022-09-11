<?php

namespace App\Base;

use App\Contracts\Presenters\Personal\Auth\GetClientPresenter;

abstract class Controller
{
    public function client()
    {
        $getClient = app()->make(GetClientPresenter::class);

        return $getClient();
    }
}
