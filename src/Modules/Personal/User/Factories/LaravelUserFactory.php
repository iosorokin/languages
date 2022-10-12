<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Structures\UserModel;

final class LaravelUserFactory implements UserFactory
{
    public function create(array $attributes): User
    {
        $user = new UserModel();
        $user->setName($attributes['name']);

        return $user;
    }
}
