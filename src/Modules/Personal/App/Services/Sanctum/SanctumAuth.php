<?php

namespace Modules\Personal\App\Services\Sanctum;

use Illuminate\Auth\AuthManager;
use Modules\Personal\App\Services\AuthService;
use Modules\Personal\App\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\Domain\Entity\User;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;
use Modules\Personal\Infrastructure\Repository\Providers\UserModelDataProvider;
use Modules\Personal\Infrastructure\Repository\UserDataMapper;

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
        $userModel = EloquentUserModel::query()->find($user->getId()->value());
        $userModel->currentAccessToken()?->delete();
    }

    public function getAuth(): ?User
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
