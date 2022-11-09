<?php

namespace Domain\Personal\Roles\Repository;

interface RolesRepository
{
    public function hasContentManagerRole(int $accountId): bool;


}
