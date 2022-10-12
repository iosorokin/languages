<?php

namespace Modules\Personal\User\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Personal\Auth\Entity\BaseAuth;
use Modules\Personal\Permissions\Entities\Permission;

interface User extends
    HasIntId,
    HasTimestamps
{
    public function getBaseAuth(): BaseAuth;

    public function setName(string $name): self;

    public function setPermission(Permission $permission): self;

    public function getPermission(): Permission;

    public function getName(): string;
}
