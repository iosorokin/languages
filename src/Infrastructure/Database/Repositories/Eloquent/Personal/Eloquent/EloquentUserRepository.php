<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Account\Domain\UserRepository;
use Illuminate\Support\Facades\DB;
use Infrastructure\Database\Repositories\Eloquent\Personal\Providers\UserRawDataProvider;
use Infrastructure\Database\Repositories\Eloquent\Personal\UserDataMapper;
use WIP\Personal\Account\Model\Aggregates\Account;

final class EloquentUserRepository implements UserRepository
{
    public function add(Account $user): void
    {
        $userModel = new EloquentUserModel($user->selfToArray());
        $authModel = new EloquentBaseAuthModel($user->baseAuth()->toArray());

        DB::transaction(function () use ($userModel, $authModel) {
            $userModel->save();
            $authModel->user()->associate($userModel);
            $authModel->save();
        });

        $user->commit(new BigIntId($userModel->id));
    }

    public function getByEmail(string $email): ?Account
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
