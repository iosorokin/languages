<?php

namespace Domain\Account\Services\Auth\Sanctum\Actions;

use Domain\Account\Model\Aggregates\Account;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Laravel\Sanctum\NewAccessToken;

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
