<?php

namespace Modules\Personal\Auth\Services\Sanctum;

use Modules\Personal\Auth\Dto\AuthDto;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Services\Sanctum\Actions\CreateSanctumToken;
use Modules\Personal\Auth\Services\Sanctum\Dto\CreateSanctumTokenDto;
use Modules\Personal\Auth\Services\Sanctum\Repositories\SanctumApiTokenRepository;

class SanctumAuth implements AuthService
{
    public function __construct(
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
}
