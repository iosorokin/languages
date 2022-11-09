<?php

namespace Domain\Personal\Account\Services\Auth;

interface Auth
{
    public function id(): int;

    public function isRoot(): bool;

    public function isStudent(): bool;
}
