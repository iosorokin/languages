<?php

namespace Modules\Personal\User\Entities;

interface HasUser
{
    public function setUser(User $user): self;

    public function getUser(): User;

    public function setUserId(int $id): self;

    public function getUserId(): int;
}
