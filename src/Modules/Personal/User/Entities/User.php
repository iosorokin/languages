<?php

namespace Modules\Personal\User\Entities;

use Illuminate\Support\Carbon;
use Modules\Personal\Auth\Entity\BaseAuth;
use Modules\Personal\Permissions\Entities\Permission;

interface User
{
    public function getId(): int;

    public function getBaseAuth(): BaseAuth;

    public function setName(string $name): self;

    public function setPermission(Permission $permission): self;

    public function getPermission(): Permission;

    public function getName(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;
}
