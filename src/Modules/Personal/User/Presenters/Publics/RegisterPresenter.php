<?php

namespace Modules\Personal\User\Presenters\Publics;

use Modules\Personal\User\Structures\User;

interface RegisterPresenter
{
    public function __invoke(array $attributes): User;
}
