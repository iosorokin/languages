<?php

declare(strict_types=1);

namespace Modules\Personal\Actions;

use Modules\Personal\Entity\User;

final class CreateUser
{
    public function __invoke(array $attributes): User
    {
        $user = User::register($attributes);

        return $user;
    }
}
