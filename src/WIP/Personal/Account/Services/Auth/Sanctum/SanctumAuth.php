<?php

namespace WIP\Personal\Account\Services\Auth\Sanctum;

use Illuminate\Auth\AuthManager;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Providers\UserModelDataProvider;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\UserDataMapper;
use WIP\Personal\Account\Model\Aggregates\Account;
use WIP\Personal\Account\Services\Auth\Auth;
use WIP\Personal\Account\Services\Auth\AuthService;
use WIP\Personal\Account\Services\Auth\Sanctum\Actions\CreateSanctumToken;

class SanctumAuth implements AuthService
{
    public function __construct(
        private AuthManager $authManager,
    ) {}

    public function login(Account $account): ?string
    {
        /** @var CreateSanctumToken $createSanctumToken */
        $createSanctumToken = app()->make(CreateSanctumToken::class);
        $token = $createSanctumToken($account, []);

        return $token->plainTextToken;
    }

    public function logout(Auth $user): void
    {
        $userModel = EloquentUserModel::query()->find($user->getId()->value());
        $userModel->currentAccessToken()?->delete();
    }

    public function getAuth(): ?Auth
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
