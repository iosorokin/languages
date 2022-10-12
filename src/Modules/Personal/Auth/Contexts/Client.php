<?php

namespace Modules\Personal\Auth\Contexts;

use Modules\Personal\User\Structures\User;

interface Client
{
    public function user(): ?User;

    public function id(): ?int;

    public function isAdmin(): bool;

    public function isUser(): bool;

    public function isGuest(): bool;

    public function isMember(): bool;
}
