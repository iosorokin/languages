<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

enum Access: string
{
    case Root = 'root';

    case Admin = 'admin';

    case Student = 'student';

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
