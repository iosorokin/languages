<?php

namespace WIP\Personal\Roles\Repository;

interface RolesRepository
{
    public function hasContentManagerRole(int $accountId): bool;


}
