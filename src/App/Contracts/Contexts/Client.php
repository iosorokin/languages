<?php

namespace App\Contracts\Contexts;

use Modules\Personal\User\Entities\User;

interface Client
{
    public function user(): ?User;

    public function id(): ?int;

    public function isAdmin(): bool;

    public function isUser(): bool;

    public function isGuest(): bool;
}
