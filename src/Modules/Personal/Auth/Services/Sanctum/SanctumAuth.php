<?php

namespace Modules\Personal\Auth\Services\Sanctum;

use Illuminate\Auth\AuthManager;
use Laravel\Sanctum\HasApiTokens;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\User\Model\User;

class SanctumAuth implements AuthService
{
    public function __construct(
        private AuthManager $authManager,
    ) {}

    public function login(User $user): ?string
    {
        /** @var CreateSanctumToken $createSanctumToken */
        $createSanctumToken = app()->make(CreateSanctumToken::class);
        $token = $createSanctumToken($user, []);

        return $token->plainTextToken;
    }

    public function logout(User $user): void
    {
        /** @var HasApiTokens $user */
        $user->currentAccessToken()?->delete();
    }

    public function getAuth(): ?User
    {
        /** @var null|User $user */
        $user = $this->authManager
            ->guard('sanctum')
            ->user();

        return $user;
    }
}
