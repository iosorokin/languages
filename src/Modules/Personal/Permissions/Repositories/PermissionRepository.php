<?php

namespace Modules\Personal\Permissions\Repositories;

use Modules\Personal\Permissions\Structures\Permission;

interface PermissionRepository
{
    public function save(Permission $role): void;
}
