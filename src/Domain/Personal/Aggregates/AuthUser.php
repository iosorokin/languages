<?php

declare(strict_types=1);

namespace Domain\Personal\Aggregates;

use App\Values\Identificatiors\Id\IntId;
use Domain\Personal\Entities\User;

final class AuthUser
{
    public function __construct(
        private User $user,
    ) {}

    public function id(): IntId
    {

    }
}
