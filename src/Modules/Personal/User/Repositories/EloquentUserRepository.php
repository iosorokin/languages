<?php

declare(strict_types=1);

namespace Modules\Personal\User\Repositories;

use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Entities\UserModel;

final class EloquentUserRepository implements UserRepository
{
    public function save(User $user): void
    {
        $user->save();
    }

    public function get(int $id): ?User
    {
        return UserModel::find($id);
    }
}
