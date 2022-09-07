<?php

namespace Modules\Personal\Auth\Actions;

use App\Contracts\AuthableStructure;
use Modules\Personal\Auth\Dto\AuthDto;
use Modules\Personal\Auth\Services\AuthService;

class Auth
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(AuthableStructure $authable): ?string
    {
        $dto = new AuthDto(
            authable: $authable,
        );

        return $this->authService->auth($dto);
    }
}
