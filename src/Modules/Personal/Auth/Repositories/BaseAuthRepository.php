<?php

namespace Modules\Personal\Auth\Repositories;

use Modules\Personal\Auth\Entity\BaseAuth;

interface BaseAuthRepository
{
    public function save(BaseAuth $baseAuth): void;

    public function getByEmail(string $email): ?BaseAuth;
}
