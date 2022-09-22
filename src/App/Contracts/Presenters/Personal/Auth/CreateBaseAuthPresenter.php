<?php

namespace App\Contracts\Presenters\Personal\Auth;

use App\Contracts\Structures\BaseAuthStructure;

interface CreateBaseAuthPresenter
{
    public function __invoke(array $attributes): BaseAuthStructure;
}
