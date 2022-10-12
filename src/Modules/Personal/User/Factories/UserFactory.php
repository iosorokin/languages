<?php

namespace Modules\Personal\User\Factories;

use Modules\Personal\User\Structures\User;

interface UserFactory
{
    public function create(array $attributes): User;
}
