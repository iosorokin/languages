<?php

namespace Domain\Personal\Values\Accesses;

interface Accesses
{
    public function addAccess(string|Access $access): self;

    public function deleteAccess(string|Access $access): self;

    public function isUser(): bool;

    public function isRoot(): bool;

    public function isAdmin(): bool;

    public function toArray(): array;
}
