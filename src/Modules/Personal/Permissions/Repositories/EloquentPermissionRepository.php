<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Repositories;

use Modules\Personal\Permissions\Entities\Permission;

final class EloquentPermissionRepository implements PermissionRepository
{
    public function save(Permission $role): void
    {
        $role->save();
    }
}