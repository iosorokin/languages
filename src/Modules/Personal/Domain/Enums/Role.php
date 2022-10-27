<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Enums;

enum Role: string
{
    case Root = 'root';

    case Admin = 'admin';

    case User = 'user';

    public function isRoot(): bool
    {
        return $this->value === static::Root->value;
    }

    public function isAdmin(): bool
    {
        return $this->value === static::Admin->value;
    }

    public function isUser(): bool
    {
        return $this->value === static::User->value;
    }
}
