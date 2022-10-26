<?php

declare(strict_types=1);

namespace App\Database\Personal;

use App\Database\Personal\Providers\UserRawDataProvider;
use App\Values\Identificatiors\BigIntId;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Personal\Entity\User;

final class EloquentUserRepository implements UserRepository
{
    public function add(User $user): void
    {
        $userModel = new EloquentUserModel($user->selfToArray());
        $authModel = new EloquentBaseAuthModel($user->baseAuth()->toArray());

        DB::transaction(function () use ($userModel, $authModel) {
            $userModel->save();
            $authModel->user()->associate($userModel);
            $authModel->save();
        });

        $user->setId(new BigIntId($userModel->id));
    }

    public function getByEmail(string $email): ?User
    {
        $data = DB::table('users')
            ->rightJoin('base_auths', 'users.id', 'base_auths.user_id')
            ->where('base_auths.email', $email)
            ->first();

        if ($data) {
            $provider = new UserRawDataProvider($data);
            $user = UserDataMapper::restore($provider);
        }

        return $user ?? null;
    }
}
