<?php

declare(strict_types=1);

namespace Modules\Personal\User\Repositories;

use Modules\Personal\User\Structures\UserModel;
use Modules\Personal\User\Structures\UserStructure;
use Webmozart\Assert\Assert;

final class EloquentUserRepository implements UserRepository
{
    public function add(UserStructure $user): void
    {
        $user = $this->assertIsUserModel($user);
        $user->save();
    }

    private function assertIsUserModel(UserStructure $user): UserModel
    {
        Assert::isInstanceOf($user, UserModel::class);

        /** @var UserModel $user */
        return $user;
    }
}
