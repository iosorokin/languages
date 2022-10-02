<?php

declare(strict_types=1);

namespace Core\Base;

use App\Contracts\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

abstract class Presenter
{
    protected function client(): Client
    {
        $getClient = app(GetClientPresenter::class);

        return $getClient();
    }
}
