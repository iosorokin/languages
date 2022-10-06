<?php

namespace Modules\Personal\Permissions\Repositories;

use Modules\Personal\Permissions\Entities\Permission;

interface PermissionRepository
{
    public function save(Permission $role): void;
}
