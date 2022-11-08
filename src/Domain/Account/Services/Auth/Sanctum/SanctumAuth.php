<?php

namespace Domain\Account\Services\Auth\Sanctum;

use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Services\Auth\Auth;
use Domain\Account\Services\Auth\AuthService;
use Domain\Account\Services\Auth\Sanctum\Actions\CreateSanctumToken;
use Illuminate\Auth\AuthManager;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Database\Repositories\Personal\Providers\UserModelDataProvider;
use Infrastructure\Database\Repositories\Personal\UserDataMapper;

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
