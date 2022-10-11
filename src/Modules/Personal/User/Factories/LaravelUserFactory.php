<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;

final class LaravelUserFactory implements UserFactory
{
    public function create(array $attributes): User
    {
        $user = new UserModel();
        $user->setName($attributes['name']);

        return $user;
    }
}
