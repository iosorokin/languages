<?php

namespace Modules\Personal\Contexts\BaseAuth\Services\Sanctum\Actions;

use App\Database\Personal\EloquentUserModel;
use Laravel\Sanctum\NewAccessToken;
use Modules\Personal\Entity\User;

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
