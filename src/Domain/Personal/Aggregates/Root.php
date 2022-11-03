<?php

declare(strict_types=1);

namespace Domain\Personal\Aggregates;

use Domain\Personal\Entities\User;
use Domain\Personal\Policies\CanAssignAsRoot;
use Domain\Personal\Values\Accesses\Access;
use Domain\Personal\Values\Accesses\AccessesImp;

final class Root
{
    public function __construct(
        private User $user,
    ) {}

    public function confirm(CanAssignAsRoot $canAssignAsRoot): self
    {
        $canAssignAsRoot();
        $accesses = AccessesImp::new($this->user->accesses());
        $accesses->addAccess(Access::Root);
        $this->user->setAccesses($accesses);

        return $this;
    }
}
