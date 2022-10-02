<?php

namespace Modules\Personal\User\Presenters\Admin;

use Modules\Personal\User\Entities\User;

interface AdminCreateUserPresenter
{
    public function __invoke(array $attributes): User;
}
