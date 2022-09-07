<?php

namespace App\Repositories\Personal\User;

use App\Structures\Personal\UserStructure;
use Modules\Personal\User\Structures\UserModel;
use Webmozart\Assert\Assert;

class EloquentUserRepository implements UserRepository
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
