<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Rules\BigIntId;
use Domain\Personal\Values\Accesses\UnconfirmUser;

final class AuthUser
{
    public function __construct(
        private BigIntId      $id,
        private UnconfirmUser $roles,
    ) {}

    public function id(): BigIntId
    {
        return $this->id;
    }

    public function roles(): UnconfirmUser
    {
        return $this->roles;
    }
}
