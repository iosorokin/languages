<?php

namespace Modules\Personal\User\Presenters\Guest;

use Modules\Personal\User\Entities\User;

interface RegisterPresenter
{
    public function __invoke(array $attributes): User;
}
