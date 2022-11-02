<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use Illuminate\Support\Collection;

abstract class BaseAccesses
{
    protected Collection $roles;

    protected function __construct(array $roles = [])
    {
        $this->roles = collect($roles);
    }
}
