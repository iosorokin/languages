<?php

namespace Modules\Personal\Auth\Services\Sanctum\Actions;

use Laravel\Sanctum\NewAccessToken;
use Modules\Personal\User\Model\User;

class CreateSanctumToken
{
    public function __invoke(User $user, array $attributes): NewAccessToken
    {
        return $user->createToken(
            name: $attributes['name'] ?? 'default',
            abilities: $attributes['abilities'] ?? ['*'],
            expiresAt: $attributes['expires_at'] ?? null,
        );
    }
}
