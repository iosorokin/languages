<?php

namespace Modules\Personal\Auth\Repositories;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;

interface BaseAuthRepository
{
    public function add(BaseAuthStructure $structure): void;

    public function getByEmail(string $email): ?BaseAuthFiller;
}
