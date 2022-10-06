<?php

namespace Modules\Personal\Permissions\Factories;

use Modules\Personal\Permissions\Entities\Permission;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\User;

interface PermissionFactory
{
    /**
     * @param array<PermissionType> $permissions
     */
    public function create(User $user, array $permissions): Permission;
}
