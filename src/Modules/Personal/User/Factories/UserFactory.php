<?php

declare(strict_types=1);

namespace Modules\Personal\User\Factories;

use Modules\Personal\User\Model\User;
use Modules\Personal\User\Values\Roles;

final class UserFactory
{
    public function create(array $attributes): User
    {
        $user = new User();
        $this->fillAttributes($user, $attributes);

        return $user;
    }

    private function fillAttributes(User $user, array $attributes): void
    {
        $user->roles = new Roles($attributes['roles'] ?? []);
        $user->name = $attributes['name'];
    }
}
