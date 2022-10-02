<?php

namespace Modules\Personal\Auth\Contexts;

use App\Contracts\Contexts\Client;
use Modules\Personal\User\Entities\User;

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
}
