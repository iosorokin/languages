<?php

namespace App\Contracts\Presenters\Personal\Auth;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;

interface CreateBaseAuthPresenter
{
    public function __invoke(AuthableStructure $authable, array $attributes): BaseAuthStructure;
}
