<?php

namespace Domain\Personal\Account\Model;

interface Client
{
    public function id(): ?int;

    public function isRoot(): bool;

    public function isStudent(): bool;

    public function isGuest(): bool;
}
