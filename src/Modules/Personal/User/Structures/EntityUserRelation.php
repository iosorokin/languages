<?php

declare(strict_types=1);

namespace Modules\Personal\User\Structures;

trait EntityUserRelation
{
    private int $userId;

    private User $user;

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUserId(int $id): self
    {
        $this->userId = $id;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user->getId();
    }
}
