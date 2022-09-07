<?php

namespace Modules\Personal\Auth\Actions;

use App\Contracts\Structures\AuthableStructure;
use Modules\Personal\Auth\Dto\AuthDto;
use Modules\Personal\Auth\Services\AuthService;

class Auth
{
    public function __construct(

    ) {}

    public function __invoke(AuthableStructure $authable, array $attributes = []): ?string
    {


        return $this->authService->auth($dto);
    }
}
