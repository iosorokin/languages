<?php

namespace Modules\Personal\Permissions\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Entities\HasUser;

interface Permission extends
    HasIntId,
    HasUser,
    HasTimestamps
{
    public function setPermission(PermissionType $roleType): self;

    public function assignRoot(): self;

    public function isRoot(): bool;

    public function assignAdmin(): self;

    public function isAdmin(): bool;

    public function assignUser(): self;

    public function isUser(): bool;
}
