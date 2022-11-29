<?php

namespace WIP\Personal\Account\Services\Auth\Sanctum\Actions;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use Laravel\Sanctum\NewAccessToken;
use WIP\Personal\Account\Model\Aggregates\Account;

class CreateSanctumToken
{
    public function __invoke(Account $account, array $attributes): NewAccessToken
    {
        $userModel = new EloquentUserModel();

        return $userModel->createToken(
            name: $attributes['name'] ?? 'default',
            abilities: $attributes['abilities'] ?? ['*'],
            expiresAt: $attributes['expires_at'] ?? null,
        );
    }
}
