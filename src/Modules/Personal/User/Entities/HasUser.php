<?php

namespace Modules\Personal\User\Entities;

interface HasUser
{
    public function setUser(User $user): self;

    public function getUser(): User;

    public function getUserId(): int;
}
