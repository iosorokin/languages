<?php

namespace Modules\Personal\Auth\Services;

use Modules\Personal\Auth\Dto\AuthDto;

interface AuthService
{
    public function auth(AuthDto $dto): ?string;
}
