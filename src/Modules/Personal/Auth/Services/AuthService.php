<?php

namespace Modules\Personal\Auth\Services;

use App\Contracts\Structures\AuthableStructure;
use Modules\Personal\Auth\Dto\AuthDto;

interface AuthService
{
    public function auth(AuthDto $dto): ?string;

    public function getAuth(): ?AuthableStructure;
}
