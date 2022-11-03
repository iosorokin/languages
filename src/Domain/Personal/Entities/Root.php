<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use Domain\Personal\Policies\UserAccessPolicy;
use Domain\Personal\Values\Accesses\NewAccesses;

final class Root
{
    private function __construct(
        private User $user,
    ) {}

    public static function new(User $user): self
    {
        $root = new self($user);

        return $root;
    }

    public function confirm(UserAccessPolicy $policy): self
    {
        $this->user->setAccesses(NewAccesses::make($this->user->accesses(), $policy));

        return $this;
    }
}
