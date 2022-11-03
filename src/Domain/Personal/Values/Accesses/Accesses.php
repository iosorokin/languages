<?php

namespace Domain\Personal\Values\Accesses;

use Illuminate\Contracts\Support\Arrayable;

interface Accesses extends Arrayable
{
    public function isUser(): bool;

    public function isRoot(): bool;

    public function isAdmin(): bool;
}
