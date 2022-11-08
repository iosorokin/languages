<?php

namespace App\Values\State;

use App\Values\ValueObject;

interface IsActive extends ValueObject
{
    public function get(): bool;

    public function compare(IsActive $isActive): bool;

    public function toBool(): bool;

    public function activate(): self;

    public function deactivate(): self;
}
