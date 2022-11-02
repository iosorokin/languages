<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Personal\Eloquent;

use App\Values\Identificatiors\Id\BigIntIntId;
use Domain\Personal\Domain\UserRepository;
use Domain\Personal\Entities\User;
use Illuminate\Support\Facades\DB;
use Infrastructure\Database\Repositories\Personal\Providers\UserRawDataProvider;
use Infrastructure\Database\Repositories\Personal\UserDataMapper;

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

        $user->setId(new BigIntIntId($userModel->id));
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
