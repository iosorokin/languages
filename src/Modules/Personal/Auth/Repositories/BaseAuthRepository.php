<?php

namespace Modules\Personal\Auth\Repositories;

use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;
use Modules\Personal\Auth\Structures\BaseAuthStructure;

interface BaseAuthRepository
{
    public function add(BaseAuthStructure $structure): void;

    public function getByEmail(string $email): ?BaseAuthFiller;
}
