<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Factories;

use Modules\Personal\Permissions\Entities\Permission;
use Modules\Personal\Permissions\Entities\PermissionModel;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\User;

final class ModelPermissionFactory implements PermissionFactory
{
    /**
     * @param array<PermissionType> $permissions
     */
    public function create(User $user, array $permissions): Permission
    {
        $model = new PermissionModel();
        $model->setUser($user);

        foreach ($permissions as $permission) {
            $model->setPermission($permission);
        }

        return $model;
    }
}
