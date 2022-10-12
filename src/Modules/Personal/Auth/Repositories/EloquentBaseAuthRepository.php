<?php

namespace Modules\Personal\Auth\Repositories;

use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class EloquentBaseAuthRepository implements BaseAuthRepository
{
    public function save(BaseAuth $baseAuth): void
    {
        $baseAuth->save();
    }

    public function getByEmail(string $email): ?BaseAuth
    {
        /** @var BaseAuthModel $baseAuth */
        $baseAuth = BaseAuthModel::query()
            ->where('email', $email)
            ->with('user')
            ->first();

        return $baseAuth;
    }
}
