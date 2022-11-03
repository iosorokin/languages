<?php

declare(strict_types=1);

namespace Domain\Personal\Aggregates;

use Domain\Personal\Entities\User;

final class NewUser implements Person
{
    public function __construct(
        private User $user,
    ) {}
}
