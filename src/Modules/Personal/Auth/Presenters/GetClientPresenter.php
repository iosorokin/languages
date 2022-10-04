<?php

namespace Modules\Personal\Auth\Presenters;

use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\User\Entities\User;

interface GetClientPresenter
{
    public function __invoke(?User $user = null): Client;
}
