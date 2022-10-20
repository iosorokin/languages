<?php

namespace Modules\Personal\User\Structures;

use App\Base\Structure\Identify\HasIntId;
use App\Base\Structure\Timestamps\HasTimestamps;
use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Permissions\Structures\Permission;

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
