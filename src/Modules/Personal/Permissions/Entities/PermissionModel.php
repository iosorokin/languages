<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class PermissionModel extends Model implements Permission
{
    use EloquentUserRelation;
    use EloquentTimestamps;

    protected $table = 'user_permissions';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    public function getId(): int
    {
        return $this->user_id;
    }

    public function setPermission(PermissionType $roleType): self
    {
        match (true) {
            $roleType->isRoot() => $this->assignRoot(),
            $roleType->isAdmin() => $this->assignAdmin(),
            $roleType->isUser() => $this->assignUser(),
        };

        return $this;
    }

    public function assignRoot(): self
    {
        $this->root = true;

        return $this;
    }

    public function removeRoot(): self
    {
        $this->root = null;

        return $this;
    }

    public function isRoot(): bool
    {
        return $this->root ?? false;
    }

    public function assignAdmin(): self
    {
        $this->admin = true;

        return $this;
    }

    public function removeAdmin(): self
    {
        $this->admin = null;

        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->admin ?? false;
    }

    public function assignUser(): self
    {
        $this->user = true;

        return $this;
    }

    public function removeUser(): self
    {
        $this->user = null;

        return $this;
    }

    public function isUser(): bool
    {
        return $this->user ?? false;
    }
}
