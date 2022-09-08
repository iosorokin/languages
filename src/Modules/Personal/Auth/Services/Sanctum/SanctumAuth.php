<?php

namespace Modules\Personal\Auth\Services\Sanctum;

use App\Contracts\Structures\AuthableStructure;
use Illuminate\Auth\AuthManager;
use Modules\Personal\Auth\Dto\AuthDto;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\Auth\Services\Sanctum\Dto\CreateSanctumTokenDto;
use Modules\Personal\Auth\Services\Sanctum\Repositories\SanctumApiTokenRepository;

class SanctumAuth implements AuthService
{
    public function __construct(
        private AuthManager $authManager,
        private SanctumApiTokenRepository $repository,
    ) {}

    public function auth(AuthDto $authDto): ?string
    {
        /** @var CreateSanctumToken $createSanctumToken */
        $createSanctumToken = app()->make(CreateSanctumToken::class);
        $createTokenDto = $this->createSanctumAuthDto($authDto);
        $token = $createSanctumToken($createTokenDto);
        $this->repository->add($token->structure);

        return $token->getPlainTextToken();
    }

    private function createSanctumAuthDto(AuthDto $dto): CreateSanctumTokenDto
    {
        return new CreateSanctumTokenDto(
            authable: $dto->authable,
            name: 'default',
        );
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
