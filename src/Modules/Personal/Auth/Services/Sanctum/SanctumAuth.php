<?php

namespace Modules\Personal\Auth\Services\Sanctum;

use App\Contracts\Structures\AuthableStructure;
use Illuminate\Auth\AuthManager;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\Auth\Services\Sanctum\Dto\CreateSanctumTokenDto;

class SanctumAuth implements AuthService
{
    public function __construct(
        private AuthManager $authManager,
    ) {}

    public function auth(AuthableStructure $authable): ?string
    {
        /** @var CreateSanctumToken $createSanctumToken */
        $createSanctumToken = app()->make(CreateSanctumToken::class);
        $createTokenDto = CreateSanctumTokenDto::new($authable);
        $token = $createSanctumToken($createTokenDto);

        return $token->plainTextToken;
    }

    public function getAuth(): ?AuthableStructure
    {
        /** @var null|AuthableStructure $auth */
        $auth = $this->authManager
            ->guard('sanctum')
            ->user();

        return $auth;
    }
}
