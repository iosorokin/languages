<?php

namespace Infrastructure\Services\Auth\Sanctum;

use Domain\Personal\Entities\User;
use Illuminate\Auth\AuthManager;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Database\Repositories\Personal\Providers\UserModelDataProvider;
use Infrastructure\Database\Repositories\Personal\UserDataMapper;
use Infrastructure\Services\Auth\AuthService;
use Infrastructure\Services\Auth\AuthUser;
use Infrastructure\Services\Auth\Sanctum\Actions\CreateSanctumToken;

class SanctumAuth implements AuthService
{
    public function __construct(
        private AuthManager $authManager,
    ) {}

    public function login(AuthUser $user): ?string
    {
        /** @var CreateSanctumToken $createSanctumToken */
        $createSanctumToken = app()->make(CreateSanctumToken::class);
        $token = $createSanctumToken($user, []);

        return $token->plainTextToken;
    }

    public function logout(AuthUser $user): void
    {
        $userModel = EloquentUserModel::query()->find($user->getId()->value());
        $userModel->currentAccessToken()?->delete();
    }

    public function getAuth(): ?AuthUser
    {
        /** @var EloquentUserModel $userModel */
        $userModel = $this->authManager
            ->guard('sanctum')
            ->user();
        $userModel->with(['baseAuth']);
        $provider = new UserModelDataProvider($userModel);
        $user = UserDataMapper::restore($provider);

        return $user;
    }
}
