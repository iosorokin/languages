<?php

namespace Modules\Personal\Permissions\Structures;

use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Structures\HasUser;

interface Permission extends
    HasUser,
    HasTimestamps
{
    public function getId(): int;

    public function setPermission(PermissionType $roleType): self;

    public function assignRoot(): self;

    public function removeRoot(): self;

    public function isRoot(): bool;

    public function assignAdmin(): self;

    public function removeAdmin(): self;

    public function isAdmin(): bool;

    public function assignUser(): self;

    public function removeUser(): self;

    public function isUser(): bool;
}
