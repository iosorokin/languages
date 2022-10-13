<?php

namespace Modules\Personal\Auth\Contexts;

use Modules\Personal\Permissions\Structures\Permission;
use Modules\Personal\User\Structures\User;

class ClientContext implements Client
{
    private ?Permission $permission;

    public function __construct(
        public readonly ?User $user = null
    ) {
        $this->permission = $this->user?->getPermission();
    }

    public function user(): ?User
    {
        return $this->user;
    }

    public function id(): ?int
    {
        return $this->user()?->getId();
    }

    public function isRoot(): bool
    {
        return $this->permission?->isRoot();
    }

    public function isAdmin(): bool
    {
        return $this->permission?->isRoot() || $this->permission?->isAdmin();
    }

    public function isGuest(): bool
    {
        return ! $this->user;
    }

    public function isUser(): bool
    {
        return $this->permission?->isUser();
    }

    public function isMember(): bool
    {
        return $this->isUser() || $this->isAdmin();
    }
}
