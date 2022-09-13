<?php

namespace Modules\Personal\Auth\Services;

use App\Contracts\Structures\AuthableStructure;

interface AuthService
{
    public function auth(AuthableStructure $authable): ?string;

    public function getAuth(): ?AuthableStructure;
}
