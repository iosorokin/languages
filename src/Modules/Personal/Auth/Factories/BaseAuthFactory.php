<?php

namespace Modules\Personal\Auth\Factories;

use Modules\Personal\Auth\Entity\BaseAuth;

interface BaseAuthFactory
{
    public function create(array $attributes): BaseAuth;
}
