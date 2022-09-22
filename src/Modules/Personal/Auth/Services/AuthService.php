<?php

namespace Modules\Personal\Auth\Services;

use Modules\Personal\Auth\Structures\AuthableStructure;

interface AuthService
{
    public function login(AuthableStructure $authable): ?string;

    public function logout(AuthableStructure $authable): void;

    public function getAuth(): ?AuthableStructure;
}
