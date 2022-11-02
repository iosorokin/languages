<?php

namespace Infrastructure\Services\Auth\Sanctum\Actions;

use Domain\Personal\Entities\User;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Laravel\Sanctum\NewAccessToken;

class CreateSanctumToken
{
    public function __invoke(User $user, array $attributes): NewAccessToken
    {
        $userModel = new EloquentUserModel($user->toArray());

        return $userModel->createToken(
            name: $attributes['name'] ?? 'default',
            abilities: $attributes['abilities'] ?? ['*'],
            expiresAt: $attributes['expires_at'] ?? null,
        );
    }
}
