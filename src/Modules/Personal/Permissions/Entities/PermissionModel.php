<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Entities;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class PermissionModel extends Model implements Permission
{
    use EloquentId;
    use EloquentUserRelation;
    use EloquentTimestamps;

    protected $table = 'user_permissions';

    public function setPermission(PermissionType $roleType): self
    {
        match (true) {
            $roleType->isRoot() => $this->assignRoot(),
            $roleType->isAdmin() => $this->assignAdmin(),
            $roleType->isUser() => $this->assignUser(),
        };

        return $this;
    }

    public function assignRoot(): Permission
    {
        $this->is_root = true;

        return $this;
    }

    public function isRoot(): bool
    {
        return $this->is_root;
    }

    public function assignAdmin(): Permission
    {
        $this->is_admin = true;

        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function assignUser(): Permission
    {
        $this->is_user = true;

        return $this;
    }

    public function isUser(): bool
    {
        return $this->is_user;
    }
}
