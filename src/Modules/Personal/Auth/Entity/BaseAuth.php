<?php

namespace Modules\Personal\Auth\Entity;

use Illuminate\Support\Carbon;
use Modules\Personal\User\Entities\User;

interface BaseAuth
{
    public function getId(): int;

    public function setUser(User $user): self;

    public function getUser(): User;

    public function setEmail(string $email): self;

    public function getEmail(): string;

    public function setPassword(string $password): self;

    public function getPassword(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;
}
