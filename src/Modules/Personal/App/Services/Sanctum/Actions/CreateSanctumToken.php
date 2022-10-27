<?php

namespace Modules\Personal\App\Services\Sanctum\Actions;

use Laravel\Sanctum\NewAccessToken;
use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
