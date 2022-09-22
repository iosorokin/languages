<?php

namespace Modules\Personal\Auth\Repositories;

use App\Contracts\Structures\BaseAuthStructure;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;

interface BaseAuthRepository
{
    public function add(BaseAuthStructure $structure): void;

    public function getByEmail(string $email): ?BaseAuthFiller;
}
