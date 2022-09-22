<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use Illuminate\Support\Arr;
use Modules\Personal\User\Structures\UserModel;

final class UserFactory
{
    public function new(array $attributes): UserModel
    {
        $user = new UserModel();
        $user->name = Arr::get($attributes, 'name');

        return $user;
    }
}
