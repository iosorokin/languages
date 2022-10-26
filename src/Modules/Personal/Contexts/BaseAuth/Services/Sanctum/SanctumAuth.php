<?php

namespace Modules\Personal\Contexts\BaseAuth\Services\Sanctum;

use App\Database\Personal\EloquentUserModel;
use App\Database\Personal\Providers\UserModelDataProvider;
use App\Database\Personal\UserDataMapper;
use App\Database\Personal\UserModelMapper;
use Illuminate\Auth\AuthManager;
use Modules\Personal\Contexts\BaseAuth\Services\AuthService;
use Modules\Personal\Contexts\BaseAuth\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\Entity\User;

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
