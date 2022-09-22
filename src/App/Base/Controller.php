<?php

namespace App\Base;

use Modules\Personal\Auth\Presenters\GetClientPresenter;

abstract class Controller
{
    public function client()
    {
        $getClient = app()->make(GetClientPresenter::class);

        return $getClient();
    }
}
