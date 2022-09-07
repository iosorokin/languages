<?php

namespace App\Repositories\Personal\Auth;

use App\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Contexts\BaseAuthContext;

interface BaseAuthRepository
{
    public function add(BaseAuthStructure $structure): void;

    public function getByEmail(string $email): ?BaseAuthContext;
}
