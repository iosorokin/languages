<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Contexts;

use App\Rules\BigIntId;
use Modules\Personal\Domain\Values\Roles;

final class AuthUser
{
    public function __construct(
        private BigIntId $id,
        private Roles $roles,
    ) {}

    public function id(): BigIntId
    {
        return $this->id;
    }

    public function roles(): Roles
    {
        return $this->roles;
    }
}
