<?php

namespace Modules\Personal\Auth\Factories;

use Modules\Personal\Auth\Structures\BaseAuth;

interface BaseAuthFactory
{
    public function create(array $attributes): BaseAuth;
}
