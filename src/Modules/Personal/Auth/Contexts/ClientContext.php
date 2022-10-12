<?php

namespace Modules\Personal\Auth\Contexts;

use Modules\Personal\User\Structures\User;

class ClientContext implements Client
{
    public function __construct(
        public readonly ?User $user = null
    ) {}

    public function user(): ?User
    {
        return $this->user;
    }

    public function id(): ?int
    {
        return $this->user()?->getId();
    }

    public function isAdmin(): bool
    {
        return true;
    }

    public function isGuest(): bool
    {
        return true;
    }

    public function isUser(): bool
    {
        return true;
    }

    public function isMember(): bool
    {
        return $this->isUser() || $this->isAdmin();
    }
}
