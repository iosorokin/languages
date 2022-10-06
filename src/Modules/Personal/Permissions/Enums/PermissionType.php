<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Enums;

enum PermissionType: string
{
    case Root = 'root';

    case Admin = 'admin';

    case User = 'user';

    public function isRoot(): bool
    {
        return $this->name === self::Root->name;
    }

    public function isAdmin(): bool
    {
        return $this->name === self::Admin->name;
    }

    public function isUser(): bool
    {
        return $this->name === self::User->name;
    }
}
