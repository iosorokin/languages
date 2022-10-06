<?php

namespace Modules\Personal\Permissions\Internal;

use Modules\Personal\Permissions\Entities\Permission;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\User;

interface AssignPermissionPresenter
{
    /**
     * @param array<PermissionType> $permissions
     */
    public function __invoke(User $user, array $permissions): Permission;
}
