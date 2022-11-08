<?php

namespace Domain\Account\Services\Auth;

use App\Values\Identificatiors\Id\IntId;

interface Auth
{
    public function id(): int;

    public function isRoot(): bool;

    public function isStudent(): bool;
}
